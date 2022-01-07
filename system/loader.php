<?
//$currentCookieParams = session_get_cookie_params();
//$cookie_domain= 'shamsabad.org';
//if (PHP_VERSION_ID >= 70300) {
//    ini_set('session.cookie_secure', "1");
//    ini_set('session.cookie_httponly', "1");
//    ini_set('session.cookie_samesite','None');
//    session_start();
//} else {
//    session_set_cookie_params(
//        $currentCookieParams["lifetime"],
//        '/; samesite=None',
//        $cookie_domain,
//        "1",
//        "1"
//    );
//    session_start();
//}
session_start();

date_default_timezone_set('Asia/Tehran');


global $config;
require_once ('config.php');
require_once ('system/core.php');
require_once ('system/common.php');
require_once ('system/db.php');
require_once ('system/view.php');
require_once ('system/net.php');
require_once ('local/'.$config['lang'].'.php');
require_once ('includes/jdf.php');
require_once ('includes/BarcodeQR.php');

//mailer
require_once ('includes/mailer/class.phpmailer.php');
require_once ('includes/mailer/class.smtp.php');
//require_once ('includes/mailer/class.phpmaileroauthgoogle.php');
//require_once ('includes/mailer/class.pop3.php');
//
require_once ('includes/Browser-asr.php');
//require_once ('includes/phpqrcode-master/qrlib.php');
function load_nusoap() {
    require_once('lib/nusoap/nusoap.php');
}
require_once ('includes/ssp.class.php');
require_once ('includes/ssp.customized.class.php');

