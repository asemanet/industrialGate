<?php
class verifyController
{
    public function verify($data)
    {
        var_dump($data);
        require_once('lib/nusoap/nusoap.php');
        // مقادیر برگشتی از بانک
        dump($_POST);
        $token = trim($_POST['token']); // همان توکنی که در مرحله رزرو ساخته شد
        $resultCode = trim($_POST['resultCode']); // کد برگشت که برای تراکنش موفق عدد 100 میباشد
        $paymentId = trim($_POST['paymentId']); // همان شناسه خرید که در مرحله ساخت توکن استفاده کردیم
        $referenceId = trim($_POST['referenceId']); // شناسه مرجع که بانک میسازه و قابل پیگیری هست


        if($resultCode == '100'){
            $wsdl = "https://ikc.shaparak.ir/XVerify/Verify.xml";
            $client = new nusoap_client($wsdl,true);
            $client->soap_defencoding='UTF-8';
            $params['token'] = $token;
            $params['merchantId'] = 'J985'; // مرچند کد
            $params['referenceNumber'] = $referenceId;
            $params['sha1Key'] = '22338240992352910814917221751200141041845518824222260'; //sha1Key که از بانک باید گرفته شود
            $result = $client->call("KicccPaymentsVerification", array($params));
            if ($result['KicccPaymentsVerificationResult'] ==  '1100' ) // شرط برابری قیمت تراکنش رزرو شده و پرداخت شده
            {
                echo 'success pay';
            } else {
                echo 'not verified';
            }
        }else{
            echo 'not paid';
        }
    }
}