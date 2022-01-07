<?php
class UserController {
    public function logout() {
        session_destroy();
        header("Location: login");
    }

    public function __construct() {
//    echo "Hello From user controller";
    }

    public function hasRoles($roleName) {
//      $role= UserModel::access($user_id)
//      return isset();

    }

    public function profile($p1, $p2, $p3) {
        echo "profile executed";
        echo "$p1,$p2,$p3";
    }

    public function login() {
        if (isset($_POST['username'])) {
            $this->loginCheck();
        }elseif (isset($_POST['email'])){
            $this->forget($_POST['email'], $_POST['contract']);
        }else {
            $this->loginForm();
        }
    }



    private function forget($email , $contract){
        $browser= new Browser();
        br();
        if ($browser->isRobot()==true){
            exit();
        }
        $contract= test_input($contract);
        $contract= '415-'.$contract;
        $email= test_input($email);
        $user= UserModel::fetch_by_email_contract($email, $contract);
        if (isset($user['user_id'])){
            $token= generateHash(32);
            $email= $user['email'];
            UserModel::pass_req($user['user_id'], $token, $email);
            $link= "http://www.shamsabad.org/user/pass_reset_asemanet/".$token;
            $this->mailPass($email,$link, $user['company_name']);
            messageLogin('success_reset_pass',_forget_link_mailed ,true);
        }else{
            messageLogin('fail_login_forget', _email_not_found, true);
        }
    }

    public function pass_reset_asemanet($token) {
        $browser= new Browser();
        br();
        if ($browser->isRobot()==true){
            exit();
        }
        $token= test_input($token);
        $dataToken= UserModel::fetch_token($token);
        if (isset($dataToken)){
            $issueDate = explode('-', $dataToken['issue_date']);
            $issueTime= explode(' ', $dataToken['issue_date'] );
            $gregorianDate = jalali_to_gregorian($issueDate[0],$issueDate[1],$issueDate[2],'-').' '.$issueTime[1];
            $issueDate=strtotime($gregorianDate);
            if ($issueDate<(time()-7201)){
                $dataToken=null;
            }
        }
        $userId=$dataToken['user_id'];
        $email=$dataToken['email'];
        $data['token']= $token;
        if (isset($dataToken['token'])){
            UserModel::called_reset_page($token);
            if (isset($_POST['btn-reset-pass'])){
                $password1 = test_input($_POST['password']);
                $password2 = test_input($_POST['confirm_password']);
                if (preg_match('/\s/',$password1)){
                    $data['message'] = _space_password;
                    ViewForget::render("/user/forget.php",$data);
                }
                elseif (strlen($password1)<8 || strlen($password2)<8){
                    $data['message'] = _weak_password;
                    ViewForget::render("/user/forget.php",$data);
                }elseif
                ($password1 != $password2){
                    $data['message'] = _password_not_match;
                    ViewForget::render("/user/forget.php",$data);
                }
                elseif ($password1==$password2){
                    $hashedPassword = encryptPassword($password1);
                    UserModel::change_password($userId, $hashedPassword);
                    UserModel::pass_reset($userId, $hashedPassword, $email, 'by-user' );
                    UserModel::used_reset_page($token);
                    messageLogin('success_reset_pass', _btn_reset_ok, true);

                }
            }else{
                ViewForget::render("/user/forget.php",$data);
            }
        }else{
            messageLogin('fail_login_forget', _token_not_found, true);
        }
    }

    private function loginCheck() {
        $username = test_input($_POST["username"]);
        $password = test_input($_POST["password"]);
        $recordUsername = UserModel::fetch_by_username($username);
        if ($recordUsername == null) {
            messageLogin('fail_login', _email_not_registered, true);
        } else {
            $hashedPassword = encryptPassword($password);
            if ($hashedPassword == $recordUsername['password']) {
                $_SESSION['username'] = $username;
                $_SESSION['lastseen'] = $recordUsername['lastseen'];
                $session_user_id = $_SESSION['user_id'] = $recordUsername['user_id'];
                $company = UserModel::fetch_by_company($session_user_id);
                if (isset($company)){
                    if ($company['verify_email']==1) {
                        $_SESSION['email'] = $company['email'];
                    }
                    $_SESSION['mobile']= $company['manager_mobile'];
                    $_SESSION['company_name'] = $company['company_name'];
                    $_SESSION['contract_number'] = $company['contract_number'];
                    $_SESSION['qtyPermit']= $company['qty_permit'];
                    $recordWater= UserModel::water_debit($_SESSION['user_id']);
                    $_SESSION['sum_totality']= $recordWater[0]['sum_totality'];
                }
                $lastSeen = jdate('Y-m-d H:i:s');
                UserModel::update_Lastseen($session_user_id, $lastSeen);
                $_SESSION['start'] = time(); // Taking now logged in time.
                $_SESSION['expire'] = $_SESSION['start'] + (15 * 60);
                //user login info
                $_SESSION['ip'] = $_SERVER['REMOTE_ADDR'];
                $_SESSION['useragent']= $_SERVER['HTTP_USER_AGENT'];
                $browser= new Browser();
                $platform      = $browser->getPlatform();
                $browserName   = $browser->getBrowser();
                $browserVersion= $browser->getVersion();
                $isMobile      = $browser->isMobile();
                UserModel::login_summery_add($_SERVER['REMOTE_ADDR'], $session_user_id, $platform, $browserName, $browserVersion, $isMobile);

                $access= UserModel::access($_SESSION['user_id']);
                if (isset($access)){
                    $_SESSION['expire'] = $_SESSION['start'] + (480 * 60);
                    echo $_SESSION['expire'];
                    $_SESSION['roleId']= $access[0]['role_id'];
                    $_SESSION['permId']= $access[0]['perm_id'];
                    $_SESSION['name']= $access[0]['name'];
                    $_SESSION['job']= $access[0]['job'];
                    if (isset($access[0]['perm_id'])){
                        $_SESSION['perm']= $access[0]['perm_id'];
                    }
                    if ($_SESSION['roleId']=='1822'){
                        header('location: ../asr/permitCheck');
                        exit();
                    }
                    header('location: ../asr/admin');
                    exit();
                }
                if(isset($_SESSION['company_name'])){
                    header('location: ../profile/company');
                }elseif(!isset($_SESSION['company_name'])){
                    header('location: ../profile/contact');
                }
//        message('success', _login_welcome, true);
                exit;
            } else {
                messageLogin('fail_login', _invalid_password, true);
            }
        }
    }

    private function loginForm() {
        $data['test'] = array();
        ViewLogin::render("/user/login.php", $data);
    }

    public function register() {
        if (isset($_POST['email'])) {
            $this->registerCheck();
        } else {
            $this->registerForm();
        }
    }

    private function registerCheck() {
        $username = $_POST['username'];
        $password1 = $_POST['password1'];
        $password2 = $_POST['password2'];
        $contract_name = $_POST['contract_name'];
        $contract_number = $_POST['contract_number'];
        $area = $_POST['area'];

        $record = UserModel::fetch_by_username($username);
        if ($record != null) {
            messageLogin('fail_login', _already_registered, true);
        }

        if (strlen($password1) < 7 || strlen($password2) < 7) {
            messageLogin('fail_login', _weak_password, true);
        }

        if ($password1 != $password2) {
            messageLogin('fail_login', _password_not_match, true);
        }

        $hashedPassword = encryptPassword($password1);

        UserModel::insert($username, $hashedPassword, $contract_name, $contract_number, $area);

        messageLogin('success', _successfully_registered);
    }

    private function registerForm() {
        View::render("/user/register.php", array());
    }


    public function reset() {
        if (isset($_POST['password'])) {
            $this->resetPass();
        } else {
            $this->resetForm();
        }
    }

    private function resetPass() {
        if (!isset($_SESSION['user_id'])) {
            header('location: ../user/login');
            message('fail', 'لطفا ابتدا وارد سایت شوید', true);
            exit();
        }

    }

    private function resetForm() {
        if (!isset($_SESSION['user_id'])) {
            header('location: ../user/login');
            message('fail', 'لطفا ابتدا وارد سایت شوید', true);
            exit();
        }
        View::render("/user/reset.php", array());
    }


    private function mailPass($email, $link ,$companyName) {
        global $config;
//$username= $config['mailer']['gmail-username'];
//$pass= $config['mailer']['gmail-pass'];
        $username= $config['mailer']['local-username'];
        $pass= $config['mailer']['local-pass'];
        $recipient= $email;
        $recipiantName= $companyName;
        $subject= "بازیابی رمز عبور";
//        $body= $mailOtp."کد تایید شما: " ;
//        $body= file_get_contents('mvc/view/profile/mail-body.php');
        $body= '
      <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns:v="urn:schemas-microsoft-com:vml">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="viewport" content="width=device-width; initial-scale=1.0; maximum-scale=1.0;" />
    <meta name="viewport" content="width=600,initial-scale = 2.3,user-scalable=no">
    <!--[if !mso]><!-- -->
    <link href=\'https://fonts.googleapis.com/css?family=Work+Sans:300,400,500,600,700\' rel="stylesheet">
    <link href=\'https://fonts.googleapis.com/css?family=Quicksand:300,400,700\' rel="stylesheet">
    <!--<![endif]-->

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    <link href="https://cdn.rawgit.com/rastikerdar/vazir-font/v[X.Y.Z]/dist/font-face.css" rel="stylesheet" type="text/css" />
    <title>شرکت خدماتی شهرک صنعتی شمس آباد</title>

    <style type="text/css">
        body {
            width: 100%;
            background-color: #ffffff;
            margin: 0;
            padding: 0;
            -webkit-font-smoothing: antialiased;
            mso-margin-top-alt: 0px;
            mso-margin-bottom-alt: 0px;
            mso-padding-alt: 0px 0px 0px 0px;
            direction: rtl;
            font-family: sans-serif;
        }

        p,
        h1,
        h2,
        h3,
        h4 {
            margin-top: 0;
            margin-bottom: 0;
            padding-top: 0;
            padding-bottom: 0;
        }

        span.preheader {
            display: none;
            font-size: 1px;
        }

        html {
            width: 100%;
        }

        table {
            font-size: 14px;
            border: 0;
        }
        /* ----------- responsivity ----------- */

        @media only screen and (max-width: 640px) {
            /*------ top header ------ */
            .main-header {
                font-size: 20px !important;
            }
            .main-section-header {
                font-size: 28px !important;
            }
            .show {
                display: block !important;
            }
            .hide {
                display: none !important;
            }
            .align-center {
                text-align: center !important;
            }
            .no-bg {
                background: none !important;
            }
            /*----- main image -------*/
            .main-image img {
                width: 440px !important;
                height: auto !important;
            }
            /* ====== divider ====== */
            .divider img {
                width: 440px !important;
            }
            /*-------- container --------*/
            .container590 {
                width: 440px !important;
            }
            .container580 {
                width: 400px !important;
            }
            .main-button {
                width: 220px !important;
            }
            /*-------- secions ----------*/
            .section-img img {
                width: 320px !important;
                height: auto !important;
            }
            .team-img img {
                width: 100% !important;
                height: auto !important;
            }
        }

        @media only screen and (max-width: 479px) {
            /*------ top header ------ */
            .main-header {
                font-size: 18px !important;
            }
            .main-section-header {
                font-size: 26px !important;
            }
            /* ====== divider ====== */
            .divider img {
                width: 280px !important;
            }
            /*-------- container --------*/
            .container590 {
                width: 280px !important;
            }
            .container590 {
                width: 280px !important;
            }
            .container580 {
                width: 260px !important;
            }
            /*-------- secions ----------*/
            .section-img img {
                width: 280px !important;
                height: auto !important;
            }
        }

      
    </style>
    <!--[if gte mso 9]><style type=”text/css”>
    body {
        font-family: \'Work Sans\', Calibri, sans-serif;
    }
</style>
    <![endif]-->
</head>


<body class="respond" leftmargin="0" topmargin="0" marginwidth="0" marginheight="0">
<!-- pre-header -->
<table style="display:none!important;">
    <tr>
        <td>
            <div style="overflow:hidden;display:none;font-size:1px;color:#ffffff;line-height:1px;font-family:sans-serif;maxheight:0px;max-width:0px;opacity:0;">
            </div>
        </td>
    </tr>
</table>
<!-- pre-header end -->
<!-- header -->
<table border="0" width="100%" cellpadding="0" cellspacing="0" bgcolor="ffffff">

    <tr>
        <td align="center">
            <table border="0" align="center" width="590" cellpadding="0" cellspacing="0" class="container590">

                <tr>
                    <td height="25" style="font-size: 25px; line-height: 25px;">&nbsp;</td>
                </tr>

                <tr>
                    <td align="center">

                        <table border="0" align="center" width="590" cellpadding="0" cellspacing="0" class="container590">

                            <tr>
                                <td align="center" height="70" style="height:70px;">
                                    <a href="" style="display: block; border-style: none !important; border: 0 !important;"><img " src="http://shamsabad.org/build/images/logo.png" alt="" /></a>
                                </td>
                            </tr>

                            <tr>
                                <td align="center">
                                    <table width="360 " border="0" cellpadding="0" cellspacing="0" style="border-collapse:collapse; mso-table-lspace:0pt; mso-table-rspace:0pt;"
                                           class="container590 hide">
                                        <tr>
                                            <td width="120" align="center" style="font-size: 14px; font-family: \'Work Sans\', Calibri, sans-serif; line-height: 24px;">
                                                <a href="" style="color: #312c32; text-decoration: none;">برگه خروج</a>
                                            </td>
                                            <td width="120" align="center" style="font-size: 14px; font-family: \'Work Sans\', Calibri, sans-serif; line-height: 24px;">
                                                <a href="" style="color: #312c32; text-decoration: none;">پرداخت فبوض</a>
                                            </td>
                                            <td width="120" align="center" style="font-size: 14px; font-family: \'Work Sans\', Calibri, sans-serif; line-height: 24px;">
                                                <a href="" style="color: #312c32; text-decoration: none;">دسترسی آسان</a>
                                            </td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>

                <tr>
                    <td height="25" style="font-size: 25px; line-height: 25px;">&nbsp;</td>
                </tr>

            </table>
        </td>
    </tr>
</table>
<!-- end header -->

<!-- big image section -->

<table border="0" width="100%" cellpadding="0" cellspacing="0" bgcolor="ffffff" class="bg_color">

    <tr>
        <td align="center">
            <table border="0" align="center" width="590" cellpadding="0" cellspacing="0" class="container590">

                <tr>
                    <td align="center" style="color: #343434; font-size: 24px; font-family: Quicksand, Calibri, sans-serif; font-weight:700;letter-spacing: 3px; line-height: 35px;"
                        class="main-header">
                        <!-- section text ======-->

                        <div style="line-height: 35px">

                            Welcome to the future of  <span style="color: #5caad2;">industrial city</span>

                        </div>
                    </td>
                </tr>

                <tr>
                    <td height="10" style="font-size: 10px; line-height: 10px;">&nbsp;</td>
                </tr>

                <tr>
                    <td align="center">
                        <table border="0" width="40" align="center" cellpadding="0" cellspacing="0" bgcolor="eeeeee">
                            <tr>
                                <td height="2" style="font-size: 2px; line-height: 2px;">&nbsp;</td>
                            </tr>
                        </table>
                    </td>
                </tr>

                <tr>
                    <td height="20" style="font-size: 20px; line-height: 20px;">&nbsp;</td>
                </tr>

                <tr>
                    <td align="left">
                        <table border="0" width="590" align="center" cellpadding="0" cellspacing="0" class="container590">
                            <tr>
                                <td align="right" style="color: #888888; font-size: 16px; font-family: \'tahoma\'; line-height: 24px;">
                                    <!-- section text ======-->

                                    <p style="line-height: 24px; margin-bottom:15px;">

                                        <span>شرکت محترم</span>
                                        <span style="font-weight: bold">'.$companyName.'</span>

                                    </p>
                                    <p style="line-height: 24px;margin-bottom:15px;">
                                       احتراما به اطلاع می رساند به تازگی درخواستی برای تغییر رمز عبور پنل کاربری شما در شهرک صنعتی  به ثبت رسیده است. چنانچه این درخواست توسط شما به ثبت نرسیده است، خواهشمند است این پیام را نادیده بگیرید. در این صورت درخواست ثبت شده به صورت خودکار پس از گذشت ۲ ساعت منقضی خواهد شد.
                                    </p>
                                    <p>:به منظور تایید درخواست تغییر رمز عبور لطفا به آدرس زیر مراجعه نمایید</p>
                                    <br class="alert-info" style="line-height: 24px; margin-bottom:20px; font-weight: bold; ">
                                        <a href="'.$link.'" >'.$link.'</a>
                                                                            <br class="alert-info" style="line-height: 24px; margin-bottom:20px; font-weight: bold; ">

                                    </p>
                                    <table border="0" align="center" width="180" cellpadding="0" cellspacing="0" bgcolor="5caad2" style="margin-bottom:20px;">

                                        <tr>
                                            <td height="10" style="font-size: 10px; line-height: 10px;">&nbsp;</td>
                                        </tr>

                                        <tr>

                                            <td class="btn"  bgcolor="5caad2"  align="center" style=" font-size: 14px; font-family:  sans-serif; line-height: 22px; letter-spacing: 2px;">
                                                <!-- main section button -->

                                                <div style="line-height: 22px;">
                                                    <a href="" style="  color: #ffffff; text-decoration: none;">MY ACCOUNT</a>
                                                </div>
                                            </td>
                                        </tr>

                                        <tr>
                                            <td height="10" style="font-size: 10px; line-height: 10px;">&nbsp;</td>
                                        </tr>

                                    </table>
                                    <p style="line-height: 24px">
                                        ما توانستیم روزانه در مصرف 4000  کاغذ صرفه جویی کنیم <br>
                                        لطفا مارا یاری فرمایید,
                                    </p>

                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>

            </table>

        </td>
    </tr>

    <tr>
        <td height="40" style="font-size: 40px; line-height: 40px;">&nbsp;</td>
    </tr>

</table>

<!-- end section -->


<!-- main section -->


           <a href="http://www.asemanet.com/" style="display: block; border-style: none !important; border: 0 !important;"> <div href="http://www.asemanet.com/" class="col-md-12 col-sm-12 col-xs-12" style="background-image: url(http://shamsabad.org/build/images/asemanet.png); background-size: inherit; background-position: center; height: 210px ">
                <div style="height: 150px"></div>
                <div class="col-md-7" style="color: #9cc2cb; ">
                 <a href="http://www.asemanet.com/" style="display: block; border-style: none !important; border: 0 !important;"><button href="http://www.asemanet.com/" style="width: 200px; font-family: \'B Yekan\'; font-size: 16pt" class="btn btn-primary" >آسمان رایانه سوشیانت</button></a>
                </div>
            </div></a>



<!-- end section -->

<!-- contact section -->
<div height="40" style="font-size: 40px; line-height: 40px;">&nbsp;</div>

<!-- end section -->

<!-- footer ====== -->
<table border="0" width="100%" cellpadding="0" cellspacing="0" bgcolor="ffffff" class="bg_color">

    <tbody><tr class="hide">
        <td height="25" style="font-size: 25px; line-height: 25px;">&nbsp;</td>
    </tr>
    <tr>
        <td height="10" style="font-size: 10px; line-height: 10px;">&nbsp;</td>
    </tr>

    <tr>
        <td height="20" style="border-top: 1px solid #e0e0e0;font-size: 20px; line-height: 20px;">&nbsp;</td>
    </tr>

    <tr>
        <td align="center">
            <table border="0" align="center" width="590" cellpadding="0" cellspacing="0" class="container590 bg_color">

                <tbody><tr>
                    <td>
                        <table border="0" width="300" align="left" cellpadding="0" cellspacing="0" style="border-collapse:collapse; mso-table-lspace:0pt; mso-table-rspace:0pt;" class="container590">

                            <tbody><tr>
                                <!-- logo -->
                                <td align="left">
                                    <a href="http://www.asemanet.com/" style="display: block; border-style: none !important; border: 0 !important;"><img width="80" border="0" style="display: block; width: 80px;" src="http://shamsabad.org/build/images/asemanet-logo.png" alt=""></a>
                                </td>
                            </tr>

                            <tr>
                                <!--<td height="10" style="font-size: 10px; line-height: 10px;">&nbsp;</td>-->
                            </tr>

                            <tr>
                                <td align="left" style="color: #888888; font-size: 14px; font-family: \'Work Sans\', Calibri, sans-serif; line-height: 23px;" class="text_color">
                                    <div style="color: #333333; font-size: 14px; font-family: \'Work Sans\', Calibri, sans-serif; font-weight: 600; mso-line-height-rule: exactly; line-height: 23px;">

                                        <a href="mailto:" style="color: #888888; font-size: 14px; font-family: \'Hind Siliguri\', Calibri, Sans-serif; font-weight: 400;">info@asemanet.com</a>
                                        <br>
                                        02156235020 
                                        <br>
                                       <a href="http://www.asemanet.com/" style="display: block; border-style: none !important; border: 0 !important;"> طراحی و پشتیبانی فرهاد آقاساقلو</a>

                                    </div>
                                </td>
                            </tr>

                            </tbody></table>

                        <table border="0" width="2" align="left" cellpadding="0" cellspacing="0" style="border-collapse:collapse; mso-table-lspace:0pt; mso-table-rspace:0pt;" class="container590">
                            <tbody><tr>
                                <td width="2" height="10" style="font-size: 10px; line-height: 10px;"></td>
                            </tr>
                            </tbody></table>

                        <table border="0" width="200" align="right" cellpadding="0" cellspacing="0" style="border-collapse:collapse; mso-table-lspace:0pt; mso-table-rspace:0pt;" class="container590">

                            <tbody><tr>
                                <td class="hide" height="45" style="font-size: 45px; line-height: 45px;">&nbsp;</td>
                            </tr>



                            <tr>
                                <td height="15" style="font-size: 15px; line-height: 15px;">&nbsp;</td>
                            </tr>

                            <tr>
                                <td>
                                    <table border="0" align="right" cellpadding="0" cellspacing="0">
                                        <tbody><tr>
                                            <td>
                                                <a href="https://www.facebook.com/" style="display: block; border-style: none !important; border: 0 !important;"><img width="24" border="0" style="display: block;" src="http://i.imgur.com/Qc3zTxn.png" alt=""></a>
                                            </td>
                                            <td>&nbsp;&nbsp;&nbsp;&nbsp;</td>
                                            <td>
                                                <a href="https://twitter.com/" style="display: block; border-style: none !important; border: 0 !important;"><img width="24" border="0" style="display: block;" src="http://i.imgur.com/RBRORq1.png" alt=""></a>
                                            </td>
                                            <td>&nbsp;&nbsp;&nbsp;&nbsp;</td>
                                            <td>
                                                <a href="https://plus.google.com" style="display: block; border-style: none !important; border: 0 !important;"><img width="24" border="0" style="display: block;" src="http://i.imgur.com/Wji3af6.png" alt=""></a>
                                            </td>
                                        </tr>
                                        </tbody></table>
                                </td>
                            </tr>

                            </tbody></table>
                    </td>
                </tr>
                </tbody></table>
        </td>
    </tr>

    <tr>
        <td height="60" style="font-size: 60px; line-height: 60px;">&nbsp;</td>
    </tr>

    </tbody></table>
<!-- end footer ====== -->

</body>

</html>
        ';
//       mailFromGmail($username, $pass , $recipient, $recipiantName , $subject, $body);
        mailFromLocal($username, $pass , $recipient, $recipiantName, $subject, $body);

    }
}

