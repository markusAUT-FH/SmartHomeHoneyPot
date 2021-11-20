#!/usr/bin/python3

import re
from datetime import datetime, timedelta
import database as db 
import mariadb
import telegram_send
#line = '172.16.0.3 - - [25/Sep/2002:14:04:19 +0200] "GET / HTTP/1.1" 401 - "" "Mozilla/5.0 (X11; U; Linux i686; en-US; rv:1.1) Gecko/20020827"'
#regex = '([(\d\.)]+) - - \[(.*?)\] "(.*?)" (\d+) - "(.*?)" "(.*?)"'



# print re.match(regex, line).groups()

def parseApacheLogLine(line):
    regex = '([(\d\.)]+) - - \[(.*)\] "(.*?)" (\d+) (\d+) "(.*?)" "(.*?)"'
    # Structure Parsed Line:
    # 0: IP
    # 1: Timezone
    # 2: Method + Path 
    parsed_line = re.match(regex,line).groups()
    #UTC to CEST
    request_time = datetime.strptime(parsed_line[1][:-6], "%d/%b/%Y:%H:%M:%S") + timedelta(hours=1)
    return parsed_line[0],request_time, parsed_line[2]

def getLastAlarmTime(db_cursor):
    db_cursor.execute("SELECT time FROM apache_access_logs ORDER BY ID DESC;")
    time = db_cursor.fetchone()
    if not time:
        return ("2001-01-01 01:01:01","")
    else:
        return time

if __name__ == "__main__":
    
    # DB Setup
    database_connection = db.getDatabaseConnection()
    database_cursor = database_connection.cursor()
    database_cursor.execute("SELECT * FROM test;")
    #rows = database_cursor.fetchall()
    #for row in rows:
    #    print(row)

    last_alarm = datetime.strptime(getLastAlarmTime(database_cursor)[0], "%Y-%m-%d %H:%M:%S")

    with open("/var/log/apache2/access.log", "r") as access_log:
        #Read End -> Start
        lines = access_log.readlines()
        if(len(lines) == 0):
            #To Do: Create error Log file for parser! 
            print("Access Log empty!")
            exit(1)

        already_alarmed = False
        for line in reversed(lines):
            ip, time, method = parseApacheLogLine(line)
            if(last_alarm < time):
                last_alarm = time
                telegram_send.send(messages=["*ALERT*:\nConnection found from IP:{ip}".format(ip=ip)],parse_mode="Markdown")
                database_cursor.execute("INSERT INTO apache_access_logs (IP, time, message) VALUES (?,?,?)",(ip,str(time),method))
                database_connection.commit()

            