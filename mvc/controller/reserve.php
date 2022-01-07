<?php
class reserveController{
    public function reserve()
    {
//        require_once('lib/nusoap/nusoap.php');
////Sample By Mehrdad.Amini@Gmail.com
//        echo "reserve";
//$wsdl = "https://ikc.shaparak.ir/XToken/Tokens.xml";
//$client = new nusoap_client($wsdl,true);
//$client->soap_defencoding='UTF-8';
//$params['amount'] = "1100"; // قیمت
//$params['merchantId'] = "J985"; // مرچند کد
//$params['invoiceNo'] = "492243"; // شناسه فاکتور
//$params['paymentId'] = "548745847541"; // شناسه خرید
//$params['revertURL'] = "http://www.shamsabad.org/verify/verify/".$params['paymentId']; // آدرس بازگشت
//$result = $client->call("MakeToken", array($params));

/* نمونه خروجی درست $reslut =>
Array
(
    [MakeTokenResult] => Array
        (
            [message] => Success
            [result] => true
            [token] => 72540378256532943965
        )

)

اگر خروجی شبیه

Array
(
    [MakeTokenResult] => Array
        (
            [message] => Error
            [result] => false
            [token] =>
        )

)
داشتید یا مرچند کد شما اشتباه است و یا آی پی شما برای این مرچند اضافه نشده است
*/
//View::render("/page/reserve.php", $result);
View::render("/page/reserve.php");

    }
}