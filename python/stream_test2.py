#!/usr/bin/python3

import cv2

_dir = "/home/markus/SmartHomeHoneyPot/demo-video/big_buck_bunny_480p_10mb.mp4"
cap = cv2.VideoCapture(_dir)

framerate = 25.0
out = cv2.VideoWriter(
    "appsrc ! videoconvert ! x264enc noise-reduction=10000 speed-preset=ultrafast tune=zerolatency ! rtph264pay config-interval=1 pt=96 ! tcpserversink host=127.0.0.1 port=8554 sync=false",
    0,
    framerate,
    (1920, 1080),
)


counter = 0
while cap.isOpened():
    ret, frame = cap.read()
    if ret:
        out.write(frame)
        print(f"Read {counter} frames",sep='',end="\r",flush=True)
        counter += 1
        if cv2.waitKey(1) & 0xFF == ord("q"):
            break
    else:
        break

cap.release()
out.release()