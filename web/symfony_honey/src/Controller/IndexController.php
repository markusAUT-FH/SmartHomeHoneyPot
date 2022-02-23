<?php
// src/Controller/ProductController.php
namespace App\Controller;

// ...
use App\Entity\Kamtron;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\HttpFoundation\Response;

class IndexController extends AbstractController
{
    /**
     * @Route("/ccm/ccm_info_get.js")
     */
    public function ccm_info(): Response
    { 
        $response = 'message({type:"ccm_info_get_ack",from:542113792,from_handle:859,to_handle:'.$_GET["hfrom_handle"].',data:{ret:{code:"",sub:"",reason:"",desc:""},type:"IPC",sn:"1jfiegbrcrfka",nick:"MasterThesis",ver:"v5.3.1.2003161406",spv:"v1"}});';
        return new Response($response);
    }
    /**
     * @Route("/ccm/cacs_dh_req.js")
     */
    public function dh_req(): Response
    {
        $response = 'message({type:"cacs_dh_ack",from:542113792,from_handle:1133,to_handle:'.$_GET["hfrom_handle"].',data:{result:"",key_b2a:"1440365925986489230231368077205179",lid:"0x2",tid:"0x1",did:"0x0",vreq:""}})';
        return new Response($response);
    }
    /**
     * @Route("/ccm/cacs_login_req.js")
     */
    public function login_req(ManagerRegistry $doctrine): Response
    {
        $entityManager = $doctrine->getManager();
        $kamtron = new Kamtron();
        $kamtron->setRequest('pass:'.$_GET["dpass"].'|duser:'.$_GET["duser"]);
        $kamtron->setTime(date("Y-m-d H:i:s"));
        $kamtron->setFile("cacs_login_req.js");
        $entityManager->persist($kamtron);
        $entityManager->flush();

        $response = 'message({type:"cacs_login_ack",from:542113792,from_handle:1155,to_handle:'.$_GET["hfrom_handle"].',data:{result:"",sid:"0x2",seq:1089,addr:"192.168.178.65",guest:0,vreq:"",uid:"0x0",lid:"0x0",lkey:""}})';

        return new Response($response);
    }
    /**
     * @Route("/ccm/mmq_destroy.js")
     */
    public function mmq_destroy(ManagerRegistry $doctrine): Response
    {
        $entityManager = $doctrine->getManager();
        $response = 'message({type:"mmq_destroy_ack",from:542113792,to_handle:'.$_GET["hfrom_handle"].',data:{result:"err.mmq.qid.invalid"}});';

        return new Response($response);
    }
    /**
     * @Route("/ccm/mmq_create.js")
     */
    public function mmq_create(ManagerRegistry $doctrine): Response
    {
        $entityManager = $doctrine->getManager();

        /*$product = new Product();
        $product->setName('Keyboard');
        $product->setPrice(1999);
        $product->setDescription('Ergonomic and stylish!');

        // tell Doctrine you want to (eventually) save the Product (no queries yet)
        $entityManager->persist($product);

        // actually executes the queries (i.e. the INSERT query)
        $entityManager->flush(); */

        $response = 'message({type:"mmq_create_ack",from:542113792,to_handle:'.$_GET["hfrom_handle"].',data:{result:"",qid:"2729740205"}});';

        return new Response($response);
    }
    /**
     * @Route("/ccm/ccm_disk_ctl.js")
     */
    public function disc_ctl(ManagerRegistry $doctrine): Response
    {
        $entityManager = $doctrine->getManager();

        /*$product = new Product();
        $product->setName('Keyboard');
        $product->setPrice(1999);
        $product->setDescription('Ergonomic and stylish!');

        // tell Doctrine you want to (eventually) save the Product (no queries yet)
        $entityManager->persist($product);

        // actually executes the queries (i.e. the INSERT query)
        $entityManager->flush(); */

        $response = 'message({type:"ccm_disk_ctl_ack",from:542113792,from_handle:1156,to_handle:'.$_GET["hfrom_handle"].',data:{ret:{code:"",sub:"",reason:"",desc:""}}});';

        return new Response($response);
    }
    /**
     * @Route("/ccm/ccm_net_get.js")
     */
    public function net_get(ManagerRegistry $doctrine): Response
    {
        $entityManager = $doctrine->getManager();

        /*$product = new Product();
        $product->setName('Keyboard');
        $product->setPrice(1999);
        $product->setDescription('Ergonomic and stylish!');

        // tell Doctrine you want to (eventually) save the Product (no queries yet)
        $entityManager->persist($product);

        // actually executes the queries (i.e. the INSERT query)
        $entityManager->flush(); */

        $response = 'message({type:"ccm_net_get_ack",from:542113792,from_handle:1159,to_handle:'.$_GET["hfrom_handle"].',data:{ret:{code:"",sub:"",reason:"",desc:""},info:{ifs:[{token:"eth0",enabled:1,phy:{conf:{mode:"ether",mtu:1500},info:{name:"eth0",type:"",mac:"ae:ca:06:22:89:54",stat:"ok"}},ipv4:{conf:{enabled:1,mode:"dhcp",static_ip:{addr:"192.168.187.254",mask:"255.255.255.0",gw:"0.0.0.0"}},info:{stat:"ok",ip:{addr:"192.168.178.67",mask:"255.255.255.0",gw:"192.168.178.254"}}}},{token:"ra0",enabled:1,phy:{conf:{mode:"wificlient",mtu:0},info:{name:"ra0",type:"",mac:"30:4a:26:f8:9b:48",stat:"ok"}},ipv4:{conf:{enabled:1,mode:"dhcp"},info:{stat:"err",ip:{addr:"0.0.0.0",mask:"0.0.0.0",gw:"0.0.0.0"}}},wifi_client:{conf:{enabled:1,ssid:"Himmelreich-GAST",bssid:"",auth_mod:"",encrypt_mod:"",key:"",usr:""},info:{channel:0,stat:"info.keyincorrect"},ap_list:[{ssid:"DIRECT-b7-HP M477 LaserJet",connect:0,quality:69,bss:"0E:96:E6:61:C5:B7",proto:"IEEE 802.11gn",mode:"Master",freq:"2.437 GHz Channel(6)",signal:57,noise:0,bitrate:"72 Mb/s",encrypt:"on",adhoc:0},{ssid:"Himmelreich",connect:0,quality:75,bss:"B4:FB:E4:74:D7:D6",proto:"IEEE 802.11bgn",mode:"Master",freq:"2.437 GHz Channel(6)",signal:100,noise:0,bitrate:"144 Mb/s",encrypt:"on",adhoc:0},{ssid:"",connect:0,quality:60,bss:"BE:FB:E4:74:D7:D6",proto:"IEEE 802.11bgn",mode:"Master",freq:"2.437 GHz Channel(6)",signal:100,noise:0,bitrate:"144 Mb/s",encrypt:"on",adhoc:0},{ssid:"Himmelreich-GAST",connect:0,quality:27,bss:"1E:E8:29:94:FC:1F",proto:"IEEE 802.11bgn",mode:"Master",freq:"2.462 GHz Channel(11)",signal:45,noise:0,bitrate:"144 Mb/s",encrypt:"on",adhoc:0},{ssid:"Himmelreich-GAST",connect:0,quality:96,bss:"1E:E8:29:94:DF:F2",proto:"IEEE 802.11bgn",mode:"Master",freq:"2.412 GHz Channel(1)",signal:59,noise:0,bitrate:"144 Mb/s",encrypt:"on",adhoc:0},{ssid:"Himmelreich",connect:0,quality:30,bss:"18:E8:29:94:DF:F2",proto:"IEEE 802.11bgn",mode:"Master",freq:"2.412 GHz Channel(1)",signal:48,noise:0,bitrate:"144 Mb/s",encrypt:"on",adhoc:0},{ssid:"",connect:0,quality:30,bss:"22:E8:29:94:DF:F2",proto:"IEEE 802.11bgn",mode:"Master",freq:"2.412 GHz Channel(1)",signal:55,noise:0,bitrate:"144 Mb/s",encrypt:"on",adhoc:0}]},wifi_adhoc:{conf:{enabled:1,ssid:"IPC1jfiegbrcrfka",auth_mod:"OPEN",encrypt_mod:"NONE",key:"xxxxxxx",channel:0}},dhcp_srv:{conf:{enabled:1,gw:"192.168.188.254",mask:"255.255.255.0",ip_start:"192.168.188.100",ip_end:"192.168.188.253"}}}],dns:{conf:{enabled:0,mode:"dhcp",static_dns:["8.8.8.4"]},info:{stat:"ok",dns:["192.168.178.254","8.8.8.8","8.8.4.4"]}}}}});';

        return new Response($response);
    }

    /**
     * @Route("/ccm/ccm_info_get.js")
     */
    public function info_get(ManagerRegistry $doctrine): Response
    {
        $entityManager = $doctrine->getManager();

        /*$product = new Product();
        $product->setName('Keyboard');
        $product->setPrice(1999);
        $product->setDescription('Ergonomic and stylish!');

        // tell Doctrine you want to (eventually) save the Product (no queries yet)
        $entityManager->persist($product);

        // actually executes the queries (i.e. the INSERT query)
        $entityManager->flush(); */

        $response = 'message({type:"ccm_info_get_ack",from:542113792,from_handle:1169,to_handle:'.$_GET["hfrom_handle"].',data:{ret:{code:"",sub:"",reason:"",desc:""},type:"IPC",sn:"1jfiegbrcrfka",nick:"MasterThesis",ver:"v5.3.1.2003161406",spv:"v1"}});';
        return new Response($response);
    }
    /**
     * @Route("/ccm/ccm_dev_info_get.js")
     */
    public function dev_info(ManagerRegistry $doctrine): Response
    {
        $entityManager = $doctrine->getManager();

        /*$product = new Product();
        $product->setName('Keyboard');
        $product->setPrice(1999);
        $product->setDescription('Ergonomic and stylish!');

        // tell Doctrine you want to (eventually) save the Product (no queries yet)
        $entityManager->persist($product);

        // actually executes the queries (i.e. the INSERT query)
        $entityManager->flush(); */

        $response = 'message({type:"ccm_dev_info_get_ack",from:542113792,from_handle:1170,to_handle:'.$_GET["hfrom_handle"].',data:{ret:{code:"",sub:"",reason:"",desc:""},mfc:"",model:"f300",bimg_ver:"v5.3.1.2003161406",img_ver:"v5.3.1.2003161406",sn:"1jfiegbrcrfka",dev_id:"1jfiegbrcrfka",nick:"MasterThesis",type:"IPC",wifi:"rtl8188fu",os:"gm8135_v2",sensor:"soif23",p:[{n:"p2",v:"CIF"},{n:"s.pwdw",v:"0"},{n:"s.new",v:"0"},{n:"timezone_min",v:"0"},{n:"sncf",v:"v1v2"},{n:"s.sound_detect",v:"0"},{n:"nick",v:"MasterThesis"},{n:"dc.record_mode",v:"1"},{n:"s.pic_cloud",v:"1"},{n:"s.noio",v:"1"},{n:"bimg_ver",v:"v5.3.1.2003161406"},{n:"img_ver",v:"v5.3.1.2003161406"},{n:"dc.new_ealf",v:"1"},{n:"wfcnr",v:"2"},{n:"oncnt",v:"1"},{n:"type",v:"IPC"},{n:"s.sys_ok_audio",v:"1"},{n:"dc.board_type",v:"board.cfg.ptz.gm8135.nostop"},{n:"s.first_config",v:"1"},{n:"s.sensor",v:"ok"},{n:"dc.cpu_type",v:"gm8135"},{n:"s.wifq",v:"0"},{n:"s.maxid",v:"0"},{n:"s.minid",v:"0"},{n:"s.eifs",v:"srvok"},{n:"t_pwr",v:"2022-02-16 18:11:01.000+01:00"},{n:"s.cloud",v:"1"},{n:"s.audio_alarm_manually",v:"1"},{n:"s.nwwan",v:"null"},{n:"s.nwlan",v:"ok"},{n:"sn",v:"1jfiegbrcrfka"},{n:"timezone",v:"1"},{n:"s.motion_track",v:"0"},{n:"mvar",v:"{mvar_boot_times:1,bootc_pwr:1,bootc_reboot:1,t_pwr:1645035061,t_reboot:1645035061,t_boot:1645035061}"},{n:"t_boot",v:"2022-02-16 18:11:01.000+01:00"},{n:"pcrc",v:"738429573"},{n:"s.cmd",v:"1"},{n:"da.factory_config_md5",v:"v1_146adcf42093e09d22d01157742d2ef4"},{n:"s.audio_alarm",v:"1"},{n:"s.spv",v:"1"},{n:"s.neth",v:"ok"},{n:"s.search_by_cid",v:"1"},{n:"s.motion",v:"stop"},{n:"model",v:"f300"},{n:"s.code_match",v:"1"},{n:"t_reboot",v:"2022-02-16 18:11:01.000+01:00"},{n:"s.alert",v:"0"},{n:"s.oscene",v:"1"},{n:"s.vlose",v:"0"},{n:"s.qrc",v:"no"},{n:"feature",v:"3"},{n:"p0",v:"HD1080p"},{n:"uptime",v:"565"},{n:"p1",v:"D1"},{n:"s.cloud_mul_chn",v:"1"}]}});';        
        return new Response($response);
    }
    /**
     * @Route("/ccm/ccm_subscribe.js")
     */
    public function ccm_subscribe(ManagerRegistry $doctrine): Response
    {
        $entityManager = $doctrine->getManager();

        /*$product = new Product();
        $product->setName('Keyboard');
        $product->setPrice(1999);
        $product->setDescription('Ergonomic and stylish!');

        // tell Doctrine you want to (eventually) save the Product (no queries yet)
        $entityManager->persist($product);

        // actually executes the queries (i.e. the INSERT query)
        $entityManager->flush(); */

        $response = 'message({type:"ccm_subscribe_ack",from:542113792,from_handle:1173,to_handle:'.$_GET["hfrom_handle"].',data:{ret:{code:"",sub:"",reason:"",desc:""}}});';        
        return new Response($response);
    }

    /**
     * @Route("/ccm/ccm_osd_get.js")
     */
    public function ccm_osd(ManagerRegistry $doctrine): Response
    {
        $entityManager = $doctrine->getManager();

        /*$product = new Product();
        $product->setName('Keyboard');
        $product->setPrice(1999);
        $product->setDescription('Ergonomic and stylish!');

        // tell Doctrine you want to (eventually) save the Product (no queries yet)
        $entityManager->persist($product);

        // actually executes the queries (i.e. the INSERT query)
        $entityManager->flush(); */

        $response = 'message({type:"ccm_osd_get_ack",from:542113792,from_handle:4886,to_handle:'.$_GET["hfrom_handle"].',data:{ret:{code:"",sub:"",reason:"",desc:""},osd:{text:"",text_enable:0,logo_disable:0,date:{format:"YYYY-MM-DD",enable_12h:0,date_enable:1,time_enable:1},week:1}}});';        
        return new Response($response);
    }
    /**
     * @Route("/ccm/ccm_disk_get.js")
     */
    public function ccm_disk(ManagerRegistry $doctrine): Response
    {
        $entityManager = $doctrine->getManager();

        /*$product = new Product();
        $product->setName('Keyboard');
        $product->setPrice(1999);
        $product->setDescription('Ergonomic and stylish!');

        // tell Doctrine you want to (eventually) save the Product (no queries yet)
        $entityManager->persist($product);

        // actually executes the queries (i.e. the INSERT query)
        $entityManager->flush(); */

        $response = 'message({type:"ccm_disk_get_ack",from:542113792,from_handle:5119,to_handle:'.$_GET["hfrom_handle"].',data:{ret:{code:"",sub:"",reason:"",desc:""},disks:[{token:"sd",stat:"empty",size:0,available_size:0,used_size:0,dk_has_err:0,conf:{enable:1,low_space:200,msg_queue_length:10000,low_space_ratio:0.080000,middle_space_ratio:0.600000,clear_space:300,record_mode:50,sd_check_on_line:1}}]}});';        
        return new Response($response);
    }
    /**
     * @Route("/ccm/ccm_box_conf_get.js")
     */
    public function box_conf(ManagerRegistry $doctrine): Response
    {
        $entityManager = $doctrine->getManager();

        /*$product = new Product();
        $product->setName('Keyboard');
        $product->setPrice(1999);
        $product->setDescription('Ergonomic and stylish!');

        // tell Doctrine you want to (eventually) save the Product (no queries yet)
        $entityManager->persist($product);

        // actually executes the queries (i.e. the INSERT query)
        $entityManager->flush(); */

        $response = 'message({type:"ccm_box_conf_get_ack",from:542113792,from_handle:5369,to_handle:'.$_GET["hfrom_handle"].',data:{ret:{code:"",sub:"",reason:"",desc:""},conf:{enable:0,username:"",password:"",is_ps2:0,code_match:0},connect:0}});';        
        return new Response($response);
    }

    /**
     * @Route("/ccm/ccm_alert_dev_get.js")
     */
    public function alert_dev(ManagerRegistry $doctrine): Response
    {
        $entityManager = $doctrine->getManager();

        /*$product = new Product();
        $product->setName('Keyboard');
        $product->setPrice(1999);
        $product->setDescription('Ergonomic and stylish!');

        // tell Doctrine you want to (eventually) save the Product (no queries yet)
        $entityManager->persist($product);

        // actually executes the queries (i.e. the INSERT query)
        $entityManager->flush(); */

        $response = 'message({type:"ccm_alert_dev_get_ack",from:542113792,from_handle:5568,to_handle:'.$_GET["hfrom_handle"].',data:{ret:{code:"",sub:"",reason:"",desc:""},conf:{io_in_mode:"",io_out_mode:"",motion_level:82,motion_level_night:84,motion_track_switch:0,face_detect_switch:0,human_detect_switch:0,audio_level:46,motion_debounce_time:0,pir_debounce_time:0}}});';        
        return new Response($response);
    }
    
    

    


}

