<?

if (!defined('test')){
//  echo "<h2>لطفا مودم یا دستگاه روتر را جهت بروز رسانی DNS خاموش و روشن فرمایید</h2><br><h3>با سرویس دهنده اینترنت خود تماس حاصل فرمایید شما باید دی ان اس خود را بروزرسانی فرمایید!!!</h3><br><h2>این مشکل سه صورت خودکار حل خواهد شد</h2>";
  echo "<h2>در حال بروز رسانی هستیم </h2>";
  exit();
}
global $config;
$config['db']['host']='localhost';
$config['db']['user']='DB';
$config['db']['pass']='Pass';
$config['db']['name']='DbName';

$config['lang'] = 'fa';

$config['permitRate']=3000; // نرخ هر برگه خروج
$config['vatRate']=9; //نرخ مالیات و عوارض

$config['salt'] = 'sdfjskdfjghj955447DSFSDFSG548SDF';
$config['base'] = '/.';
$config['codeEghtesadi']=411481866918;
$config['shenaseMeli']=14004887729;
$config['postalCode']=1481866918;
$config['teleFinancial']='56230801';
$config['teleAbresani']='56231545';
$config['teleOffice']='56230800';
$config['address']=' تهران شهر ری حسن آباد شهرک صنعتی شمس آباد بلوار بهارستان نبش بلوار گلستان ساختمان فناوری ط سوم';
$config['zarinpal']['MerchantId'] = '8a7ac3ea-1c77-11e9-ad93-005056a205be';


$config['asanpardakht']['KEY'] = '';
$config['asanpardakht']['IV'] = '';
$config['asanpardakht']['username'] = '';
$config['asanpardakht']['password'] = '';
$config['asanpardakht']['WebServiceUrl'] = '';
$config['asanpardakht']['merchantConfigurationID'] = '';


$config['iranKish']['merchantId'] = '';
$config['iranKish']['sha1Key'] = '';
//mailer
$config['mailer']['gmail-username'] = '';
$config['mailer']['gmail-pass'] = '';
$config['mailer']['local-username'] = '';
$config['mailer']['local-pass'] = '';


$config['route'] = array(
  '/login' => '/user/login',
  '/ورود' => '/user/login' ,
  '/logout' => '/user/logout',
  '/خروج' => '/user/logout' ,

);




//var_dump($config);