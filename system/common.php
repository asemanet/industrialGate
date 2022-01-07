<?
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
function hr($return = false){
    if ($return){
        return "<hr>\n";
    } else {
        echo "<hr>\n";
    }
}

function br($return = false){
    if ($return){
        return "<br>\n";
    } else {
        echo "<br>\n";
    }

}

function dump($var, $return = false){
    if (is_array($var)){
        $out = print_r($var, true);
    } else if (is_object($var)) {
        $out = var_export($var, true);
    } else {
        $out = $var;
    }

    if ($return){
        return "\n<pre>$out</pre>\n";
    } else {
        echo "\n<pre>$out</pre>\n";
    }
}

function getCurrentDateTime(){
    return date("Y-m-d H:i:s");
}

function encryptPassword($password){
    global $config;
    return md5($password . $config['salt']);
}

function decryptPassword($password){
    global $config;
    $cryptKey  = $config['salt'];
//        $qDecoded      = rtrim( mcrypt_decrypt( MCRYPT_RIJNDAEL_256, md5( $cryptKey ), base64_decode( $password ), MCRYPT_MODE_CBC, md5( md5( $cryptKey ) ) ), "\0");
    $qDecoded= base64_encode($password.$cryptKey);
    return( $qDecoded );
}

function generatePassword($length){
    $chars =  'ABCDEFGHJKLMNPQRSTUWXYZabcdefghjkmnrstuwxyz'.
        '123456789@$%';

    $str = '';
    $max = strlen($chars) - 1;

    for ($i=0; $i < $length; $i++)
        $str .= $chars[mt_rand(0, $max)];

    return $str;
}

function GetIp()
{
    $ip = $_SERVER['REMOTE_ADDR'];
    return $ip;
}

function GetRealIp()
{
    if (!empty($_SERVER['HTTP_CLIENT_IP']))
        //check ip from share internet
        $ip = $_SERVER['HTTP_CLIENT_IP'];
    elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR']))
        //to check ip is pass from proxy
        $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
    else
        $ip = $_SERVER['REMOTE_ADDR'];
    return $ip;
}

function convertNumber($string) {
    $persian = ['۰', '۱', '۲', '۳', '۴', '۵', '۶', '۷', '۸', '۹'];
    $arabic = ['٠', '١', '٢', '٣', '٤', '٥', '٦', '٧', '٨','٩'];

    $num = range(0, 9);
    $convertedPersianNums = str_replace($persian, $num, $string);
    $englishNumbersOnly = str_replace($arabic, $num, $convertedPersianNums);

    return $englishNumbersOnly;
}

function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    $data = strip_tags($data);
    $data = convertNumber($data);
    $data = str_replace('ي','ی', $data);
    $data = str_replace('ك','ک', $data);

    return $data;
}



function isNull($input) {
    if(strlen($input)==0){
        return null;
    }else {
        return $input;
    }
}


function getFullurl() {
    $fullurl= 'https://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
    return $fullurl;
}

function getRequestUri() {
    return $_SERVER['REQUEST_URI'];
}

function baseUrl() {
    global $config;
    return $config['base'];
}
function fullbaseUrl() {
    global $config;
    return 'https://' . $_SERVER['HTTP_HOST'] . $config['base'];
}

function strhas($string, $search, $caseSensitive = false){
    if ($caseSensitive){
        return strpos($string, $search) !== false;
    } else {
        return strpos(strtolower($string), strtolower($search)) !== false;
    }
}

function message($type, $message, $mustExit = false) {
    $data['message'] = $message;
    View::render("/message/$type.php", $data);
    if ($mustExit){
        exit;
    }
}
function messageAdmin($type, $message, $mustExit = false) {
    $data['message'] = $message;
    ViewAdmin::render("/message/$type.php", $data);
    if ($mustExit){
        exit;
    }
}
function messageMail($type, $message, $mustExit = false) {
    $data['message'] = $message;
    ViewAdmin::render("/message/$type.php", $data);
    if ($mustExit){
        exit;
    }
}

function messageLogin($type, $message, $mustExit = false) {
    $data['message'] = $message;
    ViewLogin::render("/message/$type.php", $data);
    if ($mustExit){
        exit;
    }
}

function generateHash($length = 32) {
    $characters = '2345679acdefghjkmnpqrstuvwxyz';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}

function generatePermitId($length = 7) {
    $characters = '123456789';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}

function paginantion($url , $showCount , $activeClass , $deactiveClass, $pageCount, $curentPageIndex ) {
    if ($curentPageIndex<=$showCount || $curentPageIndex>=($pageCount-$showCount)){$showCount=3;}?>
    <? ob_start();
        if ($pageCount==0){
        $pageCount=1;}?>
    <div  class=" dataTables_paginate">
        <ul class="pagination">
            <? if ($curentPageIndex!=1) {?>
                <li class="<?=$deactiveClass?>"><a href="<?=$url?>/<?=$curentPageIndex-1?>">قبلی</a></li>
            <?}else{?>
                <li class="paginate_button disabled">
                    <a href="#">قبلی</a>
                </li>
            <?}?>
            <? if ($curentPageIndex==1) { ?>
                <li class="<?=$activeClass?>" >
                    <span href="<?=$url?>/1">1</span>
                </li>
            <? }else{ ?>
                <li class="<?=$deactiveClass?>" >
                    <a href="<?=$url?>/1">1</a>
                </li>
            <? } ?>
            <li class="paginate_button disabled">
                <? if ($curentPageIndex>$showCount){?>
                <a  href="">...</a>
                <?}?>
            </li>
            <?
            for ($i=$curentPageIndex-$showCount; $i<=$curentPageIndex+$showCount; $i++){  ?>
                <? if ($i <= 1) { continue;}?>
                <? if ($i >= $pageCount) {continue;}?>
                <? if ($i == $curentPageIndex) { ?>
                    <li class="<?=$activeClass?>">
                        <span><?=$i?></span>
                    </li>
                <? }else{ ?>
                    <li class="<?=$deactiveClass?>">
                        <a href="<?=$url?>/<?=$i?>"><?=$i?></a>
                    </li>
                <?  } ?>
            <?  } ?>
            <li class="paginate_button disabled">
                <? if ($curentPageIndex<$pageCount){?>
                <a>...</a>
                <?}?>
            </li>
            <? if ($curentPageIndex==$pageCount) { ?>
                <li class="paginate_button disabled" >
                    <?if($pageCount!=1){?>
                    <span  href="<?=$url.'/'. $pageCount; ?>"><?=$pageCount?></span>
            <?}?>
                    <a  href="#" >بعدی</a>
                </li>
            <? }else{ ?>
                <li class="<?=$deactiveClass?>" >
                    <a  href="<?=$url.'/'. $pageCount; ?>">  <? if ($pageCount!=1){echo $pageCount;}; ?></a>
                </li>
                <? if ($pageCount!=$curentPageIndex) {?>
                <li class="<?=$deactiveClass?>"><a href="<?=$url?>/<?=$curentPageIndex+1?>">بعدی</a></li>
            <? }} ?>
        </ul>
    </div>
    <?
    $output= ob_get_clean();
    return $output;
}


function vat($amount , $vatRate) {

}

function addpadding($string, $blocksize = 32) {
    $len = strlen($string);
    $pad = $blocksize - ($len % $blocksize);
    $string .= str_repeat(chr($pad), $pad);
    return $string;
}

function strippadding($string)
{
    $slast = ord(substr($string, -1));
    $slastc = chr($slast);
    $pcheck = substr($string, -$slast);
    if(preg_match("/$slastc{".$slast."}/", $string)){
        $string = substr($string, 0, strlen($string)-$slast);
        return $string;
    } else {
        return false;
    }
}

function encrypt($string = "", $KEY , $IV)
{
    if (PHP_MAJOR_VERSION <= 5){
        $key = base64_decode($KEY);
        $iv = base64_decode($IV);
        return base64_encode(mcrypt_encrypt(MCRYPT_RIJNDAEL_256, $key, addpadding($string), MCRYPT_MODE_CBC, $iv));
    }
    else{
        return EncryptWS($string, $KEY , $IV);
    }
}

function decrypt($string = "", $KEY , $IV)
{
    if (PHP_MAJOR_VERSION <= 5){
        $key = base64_decode($KEY);
        $iv = base64_decode($IV);
        $string = base64_decode($string);
        return strippadding(mcrypt_decrypt(MCRYPT_RIJNDAEL_256, $key, $string, MCRYPT_MODE_CBC, $iv));
    }
    else
    return DecryptWS($string , $KEY , $IV);
}

/** @noinspection PhpUndefinedClassInspection */
function EncryptWS($string = "", $KEY , $IV)
{
//    phpinfo();
//    global $KEY,$IV;
    try {
        $opts = array(
            'ssl' => array('verify_peer'=>false, 'verify_peer_name'=>false)
        );
        $params = array ('stream_context' => stream_context_create($opts) );
//        var_dump($params);
        $client = @new soapclient("https://ipgsoap.asanpardakht.ir/paygate/merchantservices.asmx?WSDL", $params);
        dump($client);
    }
    catch (SoapFault $E)
    {
        echo "<div class=\"error\">{$E->faultstring}</div>";
        echo "<div class=\"error\">خطا در فراخوانی وب‌سرويس رمزنگاری.</div>";
        exit();
    }

    $params = array(
        'aesKey' => $KEY,
        'aesVector' => $IV,
        'toBeEncrypted' => $string
    );
//var_dump($params); ok
    $result = $client->EncryptInAES($params)
    or die("<div class=\"error\">خطای فراخوانی متد رمزنگاری.</div>");

    return $result->EncryptInAESResult;
}

function DecryptWS($string = "", $KEY , $IV)
{
//    global $KEY,$IV;
    try {
        $opts = array(
            'ssl' => array('verify_peer'=>false, 'verify_peer_name'=>false)
        );
        $params = array ('stream_context' => stream_context_create($opts) );
        $client = @new soapclient("https://ipgsoap.asanpardakht.ir/paygate/merchantservices.asmx?WSDL", $params);
    }
    catch (SoapFault $E)
    {
        echo "<div class=\"error\">{$E->faultstring}</div>";
        echo "<div class=\"error\">خطا در فراخوانی وب‌سرويس رمزنگاری.</div>";
        exit();
    }
    $params = array(
        'aesKey' => $KEY,
        'aesVector' => $IV,
        'toBeDecrypted' => $string
    );
    $result = $client->DecryptInAES($params)
    or die("<div class=\"error\">خطای فراخوانی متد رمزنگاری.</div>");
    return $result->DecryptInAESResult;
}

//////// آسان پرداخت

function sessionUp($value){
    $timeLeft= $_SESSION['expire']-time();
    if ($timeLeft<=($value*60)){
        return $_SESSION['expire'] = time() + ($value * 60);
    }
}

function hasPermitRand ($generatePermitId) {
    $arrayPermitRand=PermitModel::fetchPermitRand($generatePermitId);
    $permitRand= $arrayPermitRand[0]['permit_rand'];
    if ($permitRand==$generatePermitId){
        $newGeneratePermitId = hasPermitRand (rand(11,99999999));
        return $newGeneratePermitId;
    }else{
        return $generatePermitId;
    }
}

function generateQr($qrText) {

    $qr = new BarcodeQR();
// create
    $qr->text($qrText);
// display new QR code image
    $genQr = $qr->draw();
    ob_start();
    echo $genQr;
    ob_end_clean();

//     die();
}

function convertNumbers($srting,$toPersian=true)
{
    $en_num = array('0','1','2','3','4','5','6','7','8','9');
    $fa_num = array('۰','۱','۲','۳','۴','۵','۶','۷','۸','۹');
    if( $toPersian ) return str_replace($en_num, $fa_num, $srting);
    else return str_replace($fa_num, $en_num, $srting);
}

//function mailFromGmail ($username, $pass , $recipient, $recipientName, $subject, $body, $replyTo , $replyToName, $addCC , $addBC) {
function mailFromGmail ($username, $pass , $recipient, $recipientName, $subject, $body, $replyTo=null , $replyToName=null, $addCC=null , $addBC=null) {
    $mail = new PHPMailer();
    $mail->IsSMTP();
    $mail->SMTPAuth = true;
    $mail->SMTPSecure = 'ssl';
    $mail->SMTPDebug = 2;
    $mail->Host = 'smtp.gmail.com';
    $mail->Port = 465;
//or more succinctly:
    $mail->IsHTML(true);
    $mail->CharSet="UTF-8";
//Username to use for SMTP authentication
    $mail->Username = $username;
    $mail->Password = $pass;
//Set who the message is to be sent from
    $mail->setFrom($username , 'شرکت خدماتی شهرک صنعتی شمس آباد');
    //Set who the message is to be sent to
    $mail->addAddress($recipient, $recipientName);
    if (isset($replyTo)){
        $mail->addReplyTo($replyTo, $replyToName);
    }
    if (isset($replyTo)){
        $mail->addReplyTo($replyTo, $replyToName);
    }
    if (isset($addCC)){
        $mail->addCC($addCC);
    }
    if (isset($addBC)){
        $mail->addBCC($addBC);
    }
//Set the subject line
    $mail->Subject = $subject;
//Read an HTML message body from an external file, convert referenced images to embedded,
//convert HTML into a basic plain-text alternative body
    $mail->msgHTML("convert HTML into a basic plain-text alternative body");
//Replace the plain text body with one created manually
    $mail->Body = $body;

//send the message, check for errors
    if (!$mail->send()) {
        return "Mailer Error: " . $mail->ErrorInfo;
    } else {
        return "Message sent!";
    }
}

function mailFromLocal($username, $pass , $recipient, $recipientName, $subject, $body, $replyTo=null , $replyToName=null, $addCC=null , $addBC=null ) {
    $mail = new PHPMailer();
    $mail->IsSMTP();
    $mail->SMTPAuth = true;
    $mail->SMTPDebug = 0;
    $mail->SMTPOptions = array(
        'ssl' => array(
            'verify_peer' => false,
            'verify_peer_name' => false,
            'allow_self_signed' => true
        )
    );
    $mail->SMTPSecure = 'ssl';
    $mail->Host = 'mail.shamsabad.org';
    $mail->Port = 465;
//or more succinctly:
    $mail->IsHTML(true);
    $mail->CharSet="UTF-8";
//Username to use for SMTP authentication
    $mail->Username = $username;
    $mail->Password = $pass;
//Set who the message is to be sent from
    $mail->setFrom($username , 'شرکت خدماتی شهرک صنعتی شمس آباد');
    //Set who the message is to be sent to
    $mail->addAddress($recipient, $recipientName);
    if (isset($replyTo)){
        $mail->addReplyTo($replyTo, $replyToName);
    }
    if (isset($replyTo)){
        $mail->addReplyTo($replyTo, $replyToName);
    }
    if (isset($addCC)){
        $mail->addCC($addCC);
    }
    if (isset($addBC)){
        $mail->addBCC($addBC);
    }
//Set the subject line
    $mail->Subject = $subject;
//Read an HTML message body from an external file, convert referenced images to embedded,
//convert HTML into a basic plain-text alternative body
    $mail->msgHTML("convert HTML into a basic plain-text alternative body");
//Replace the plain text body with one created manually
    $mail->Body = $body;
//send the message, check for errors
    if(!$mail->Send()) {
//        echo 'Message was not sent.';
//        echo 'Mailer error: ' . $mail->ErrorInfo;
    } else {
//        echo 'Message has been sent.';
    }

}

 function ImportExcel($to) {

    $file_path = $to;
    //load the excel library
//    $this->load->library('excel');
    require_once ('includes/phpexcel/Classes/PHPExcel.php');
    //read file from path
    $inputFileType = PHPExcel_IOFactory::identify($file_path);
    //die(print_r($inputFileType));
    /**  Create a new Reader of the type defined in $inputFileType  **/
    $objReader = PHPExcel_IOFactory::createReader($inputFileType);
    $objPHPExcel = $objReader->load($file_path);
    //die(print_r($objPHPExcel));
    //get only the Cell Collection
    $cell_collection = $objPHPExcel->getActiveSheet()->getCellCollection();
    //extract to a PHP readable array format
    foreach ($cell_collection as $cell) {
        $column = $objPHPExcel->getActiveSheet()->getCell($cell)->getColumn();
        $row = $objPHPExcel->getActiveSheet()->getCell($cell)->getRow();
        $data_value = $objPHPExcel->getActiveSheet()->getCell($cell)->getValue();
        //header will/should be in row 1 only. of course this can be modified to suit your need.
        if ($row == 1) {
            $header[$row][$column] = $data_value;
        } else {
            $arr_data[$row][$column] = $data_value;
        }
    }
    //send the data in an array format
    $data['header'] = $header;
    $data['values'] = $arr_data;
     return $data;

 }


 function ago($time) {
    $periods = array("ثانیه", "دقیقه", "ساعت", "روز", "هفته", "ماه", "سال", "دهه");
    $lengths = array("60","60","24","7","4.35","12","10");
    $now = time();
    $difference = $now - $time;
    $tense = 'قبل';
    for($j = 0; $difference >= $lengths[$j] && $j < count($lengths)-1; $j++) {
        $difference /= $lengths[$j];
    }
    $difference = round($difference);
     return $difference . " " . $periods[$j] .' '. $tense;
}

function iranKishShowStatus($resultCode)
{
    switch ($resultCode)
    {
        case 110:
            $res = " فرآیند پرداخت توسط کاربر، لغو شد";
            break;
        case 120:
            $res ="   موجودی کافی نیست";
            break;
        case 130:
        case 131:
        case 160:
            $res ="   اطلاعات کارت اشتباه است";
            break;
        case 132:
        case 133:
            $res ="   کارت مسدود یا منقضی می باشد";
            break;
        case 140:
            $res =" زمان مورد نظر به پایان رسیده است";
            break;
        case 200:
        case 201:
        case 202:
            $res =" مبلغ بیش از سقف مجاز";
            break;
        case 166:
            $res =" بانک صادر کننده مجوز انجام  تراکنش را صادر نکرده";
            break;
        case 150:
        default:
            $res =" خطا بانک  $resultCode";
            break;
    }
return $res;
}


