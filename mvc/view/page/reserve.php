<?php
//$result= $data;
//dump($result);
////die();
//?>
<!--<form id="kicapeyment" action="https://ikc.shaparak.ir/tpayment/payment/Index" method="POST" >-->
<!--    <input type="hidden" name="token" value="--><?php //echo $result['MakeTokenResult']['token'] ?><!--">-->
<!--    <input type="hidden" name="merchantId" value="A4EA">-->
<!--</form>-->
<!--<script>document.forms["kicapeyment"].submit()</script>'-->
<!DOCTYPE html>

<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <title></title>
</head>
<body>
<?php
require_once('lib/nusoap/nusoap.php');
dump($_POST);
if($_POST['referenceId'] !="")
{
    $client = new SoapClient('https://ikc.shaparak.ir/XVerify/Verify.xml', array('soap_version'   => SOAP_1_1));
    $params['token'] =  $_POST["token"]; // please replace currentToken
    $params['merchantId'] = "J985";
    $params['referenceNumber'] = $_POST['referenceId'];
    $params['sha1Key'] = ' 22338240992352910814917221751200141041845518824222260 ';
    $result = $client->__soapCall("KicccPaymentsVerification", array($params));

}
else
{

    $client = new SoapClient('https://ikc.shaparak.ir/XToken/Tokens.xml', array('soap_version'   => SOAP_1_1));

    $params['amount'] = "1000";
    $params['merchantId'] = "J985";
    $params['invoiceNo'] = "12345678";
    $params['paymentId'] = "12345678";
    $params['specialPaymentId'] = "123456789123";
    $params['revertURL'] = "http://shamsabad.org/reserve/reserve";
    $params['description'] = "aaaaa";
    $result = $client->__soapCall("MakeToken", array($params));



    ?>

    <form method="post" action="https://ikc.shaparak.ir/TPayment/Payment/index">
        <p><input type ="hidden" name ="token" value="<?php print  $result->MakeTokenResult->token?>" ></p>
        <p><input type ="text" name ="merchantId"  value="A4CA"></p>
        <p><input type ="submit" value="DoPayment" ></p>

    </form>

    <?php
}
?>

</body>
</html>