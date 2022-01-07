<?php
class wstesterController {

    public function test(){
//phpinfo();
        header('Content-Type: text/html; charset=utf-8');
        $post = array(
            'password' => 'rahpad2468',
            'license'   => "ایران66 526آ12",
            'channel'    => "تست سیستم",
        );
        $data= curl_request("http://shamsabad.org/webservice/fetch_permit/", $post);
//       dump(json_decode($data)) ;
        echo $data;
    }
}