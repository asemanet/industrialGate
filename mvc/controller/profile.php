<?
$isGuest = !isset($_SESSION['username']);
if ($isGuest) {
  header("location: ../user/login");
  exit();
}

class ProfileController {

  public function contact() {
    $isGuest = !isset($_SESSION['username']);
    if ($isGuest) {
      header("location: ../user/login");
      exit();
    }
    $session_user_id=$_SESSION['user_id'];
    $recordUserId= UserModel::fetch_by_company($session_user_id);
    if (isset($_POST['btn'])) {
      $this->submitContact();
    } else {
      View::render("/profile/contact.php", $recordUserId);
    }
  }

    private function submitContact() {
        $recordUserId= UserModel::fetch_by_company($_SESSION['user_id']);
        $company_name=test_input($_POST['company_name']);
        $national_number=test_input($_POST['national_number']);
        $economic_code=test_input($_POST['economic_code']);
        if ($recordUserId['verify_email']==1){
            $email= $recordUserId['email'];
        }else{
            $email=test_input($_POST['email']);
        }
        $website=test_input($_POST['website']);
        $address=test_input($_POST['address']);
        $piece_number=test_input($_POST['piece_number']);
        $postal_code=test_input($_POST['postal_code']);
        $tele1=test_input($_POST['tele1']);
        $tele2=test_input($_POST['tele2']);
        $fax=test_input($_POST['fax']);
        $manager_lastname=test_input($_POST['manager_lastname']);
        $manager_name=test_input($_POST['manager_name']);
        $manager_codemeli=test_input($_POST['manager_codemeli']);
        $manager_shenasname=test_input($_POST['manager_shenasname']);
        $manager_mobile=test_input($_POST['manager_mobile']);
        $manager_home=test_input($_POST['manager_home']);
        $activity=test_input($_POST['activity']);
        $noe_shakhs=test_input($_POST['noe_shakhs']);
        $id=$_SESSION['user_id'];

        ProfileModel::modify($company_name , $national_number , $economic_code , $email , $website , $address , $piece_number , $postal_code ,  $tele1 , $tele2
            , $fax , $manager_name , $manager_lastname , $manager_codemeli ,$manager_shenasname , $manager_mobile , $manager_home , $activity , $noe_shakhs , $id );
        $_SESSION['company_name']= $company_name;
        message("success", '<span>با تشکر اطلاعات پنل کاربری شما با موفقیت ثبت گردید</span><br><br><a class="btn btn-default" href="../profile/company">بازگشت</a>', true);
//header("location:../profile/company");
    }
    

public function company() {
    $isGuest = !isset($_SESSION['username']);
    if ($isGuest) {
        header("location: ../user/login");
        exit();
    }
    if (!isset($_SESSION['company_name'])) {
        message("fail", '<span>لطفا اطلاعات <a href="/profile/contact">این فرم </a> را تکمیل فرمایید.</span>', true);
    }
    $recordUserId= UserModel::fetch_by_company($_SESSION['user_id']);
    $recordUserId['login']= UserModel::fetch_login($_SESSION['user_id']);

    $time= time()-(86400*30);
    $date= jdate('Y-m-d',$time);
    for ($i=1;  $i<32; $i++) {
        $count=ProfileModel::fetch_count_exit_permit($date, $_SESSION['user_id']);
        $dateArray=explode('-',$date);
        $dateStr= $dateArray[2].jdate_words( array('mm'=>$dateArray[1]) , '  ');
        $recordUserId['pie'][]=array(
            'count'     =>$count['COUNT(*)'],
            'date'      =>$dateStr,
        );
        $dateExp=explode('-',$date);
        $ts=jmktime(24,59,59,$dateExp[1],$dateExp[2],$dateExp[0]) + 1440; //یک روز بعد از تاریخ دلخواه
        $ts= jdate('Y-m-d',$ts);
        $date=$ts;
    }
    View::render("/profile/company.php", $recordUserId);
}

public function changePass() {
    $isGuest = !isset($_SESSION['username']);
    if ($isGuest) {
        header("location: ../user/login");
        exit();
    }
    $recordUserId= UserModel::fetch_by_company($_SESSION['user_id']);
    if ($recordUserId['verify_email']!=1){
        message("fail", '<span>لطفاً ابتدا آدرس ایمیل خود را تایید فرمایید </span><br><br><a class="btn btn-default" href="../profile/verifyEmail">تایید ایمیل</a>', true);

    }

    $currentPass= ProfileModel::current_password_fetch($_SESSION['user_id']);
    if (isset($_POST['password'])) {
        $password1 = test_input($_POST['password']);
        $password2 = test_input($_POST['confirm_password']);
        $oldPass = encryptPassword( $_POST['old-pass']);

        if ($oldPass!=$currentPass['password']){
            $data['message'] = _old_password_not_match;
            view::render("/profile/change-pass.php", $data);
        }elseif(encryptPassword($password1)===$currentPass['password']){
            $data['message'] = _new_password_sum_old_password;
            view::render("/profile/change-pass.php", $data);
        }elseif (preg_match('/\s/',$password1)){
            $data['message'] = _space_password;
            view::render("/profile/change-pass.php", $data);
        }
        elseif (strlen($password1)<8 || strlen($password2)<8){
            $data['message'] = _weak_password;
            view::render("/profile/change-pass.php", $data);
        }elseif
        ($password1 != $password2){
            $data['message'] = _password_not_match;
            view::render("/profile/change-pass.php", $data);
        }
        elseif ($password1==$password2){
            $hashedPassword = encryptPassword($password1);
            ProfileModel::change_password($_SESSION['user_id'], $hashedPassword);
            $data['message'] = _btn_reset_ok;
            session_destroy();
            message("success", '<span>با تشکر تغییر رمز عبور با موفقیت انجام گردید. لطفا مجدد وارد شوید</span><br><br><a class="btn btn-default" href="../user/login">ورود مجدد</a>', true);
        }

    }else{
        view::render("/profile/change-pass.php");
    }
}

public function verifyEmail() {
   if (isset($_POST['btn-submit'])){
       $recipient= test_input($_POST['email']);
       $otpMail = rand(100000, 999999);
       $_SESSION['mail-otp'] = $otpMail;
       $info= array(
           'recipient'      => $recipient ,
           'mail-otp'       => $otpMail ,
       );
       $_SESSION['mail-otp']= $info['mail-otp'];
       $_SESSION['recipient']= $info['recipient'];
       $this->mailer($info);
       $this->verify();
    }else {
       View::render("/profile/verify-email.php");
   }
}

public function verify() {
    if (isset($_POST['btn-verify'])){

        if ($_SESSION['mail-otp']==$_POST['otp']){
            ProfileModel::mail_verify($_SESSION['recipient'] , $_SESSION['user_id']);
            message("success", '<span>با تشکر ایمیل شما به آدرس <mark>'.$_SESSION['recipient'].'</mark> با موفقیت ثبت گردید</span><br><br><a class="btn btn-default" href="../profile/company">بازگشت</a>', true);
        }else{
            echo "کد تایید صحیح نمی باشد!!!";
            message("fail", '<span>کد تایید صحیح نمی باشد!!!</span><br><br><a class="btn btn-default" href="../profile/verifyEmail">تلاش دوباره</a>', true);

        }
        }else{
            View::render("/profile/verify-email.php");
        }
}
    private function mailer($info) {
        global $config;
//$username= $config['mailer']['gmail-username'];
//$pass= $config['mailer']['gmail-pass'];
        $username= $config['mailer']['local-username'];
        $pass= $config['mailer']['local-pass'];
        $recipient= $info['recipient'];
        $mailOtp= $info['mail-otp'];
        $recipiantName= $_SESSION["company_name"];
        $subject= "تایید آدرس ایمیل";
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
                                        <span style="font-weight: bold">'.$_SESSION["company_name"].'</span>

                                    </p>
                                    <p style="line-height: 24px;margin-bottom:15px;">
                                       شما درخواستی جهت تایید آدرس ایمیل دارید لطفا از کد زیر استفاده  فرمایید
                                    </p>
                                    <p class="alert-info" style="line-height: 24px; margin-bottom:20px; font-weight: bold; ">
                                       کد فعالسازی:
                                        <mark>'.$mailOtp.'</mark>
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