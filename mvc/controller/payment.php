<?
//header('Content-Type: text/html; charset=utf-8');
class PaymentController {
    private function success($message, $code = ''){
        message('success', $message . $code, true);
    }

    private function AsanPardakht($message, $code = ''){
        message('AsanPardakht', $message . $code, true);
    }

    private function fail($message, $code = ''){
        message('fail', $message . $code, true);
    }

    private function fetch_purchase_by_hash($purchaseHash){
        PaymentModel::fetch_purchase_by_hash($purchaseHash);
    }

    private function return_invoice_id($purchaseHash){
        PaymentModel::return_invoice_id($purchaseHash);
    }

    private function openTransaction($info){
        PaymentModel::openTransaction($info['price'], $info['userId'], $info['authority'], $info['purchaseHash'], $info['orderId']);
    }

    private function closeTransactionAsanPardakht($info){
        PaymentModel::closeTransactionAsanPardakht($info['authority'], $info['reference'] , $info['cardNumber'] , $info['RRN']);
    }

    private function closeTransactionZarinPal($info){
        PaymentModel::closeTransactionZarinPal($info['authority'], $info['reference']);
    }

    private function is_purchase_not_payed($userId){
        PaymentModel::is_purchase_not_payed($userId);
    }

    private function add_purchase_invoice_id($purchaseHash, $newInvoiceId){
        PaymentModel::add_purchase_invoice_id($purchaseHash, $newInvoiceId);
    }

    private function create_permit_after_purchase($info1) {
        PermitModel::create_permit_after_purchase($info1['userId'], $info1['purchaseHash'] , $info1['qty']);
    }

    private function update_payed($info1) {
        PermitModel::update_payed($info1['purchaseHash']);
    }

    private function last_record() {
        PaymentModel::last_record();
    }
    private function  create_invoice ($invoiceUserId, $invoicePurchaseHash, $title, $issueDate, $rate, $qty, $amount, $debit, $vat ,$totality ) {
        PaymentModel::create_invoice($invoiceUserId, $invoicePurchaseHash, $title, $issueDate, $rate, $qty, $amount, $debit, $vat ,$totality );
    }
    private function create_customer_detailes($invoiceId, $companyName, $address, $tel, $nationalNumber, $economicCode, $postalCode ){
        PaymentModel::create_customer_detailes($invoiceId, $companyName, $address, $tel, $nationalNumber, $economicCode, $postalCode );
    }

    private function invoicing($purchaseHash){
        $purchaseDetails= PaymentModel::fetch_purchase_by_hash($purchaseHash);
        $companyName=           $purchaseDetails['company_name'];
        $nationalNumber=        $purchaseDetails['national_number'];
        $economicCode=          $purchaseDetails['economic_code'];
        $address=               $purchaseDetails['address'];
        $tel=                   $purchaseDetails['tele1'];
        $postalCode=            $purchaseDetails['postal_code'];

        $title=                 $purchaseDetails['title'];
        $issueDate=             $purchaseDetails['issue_date'];
        $rate=                  $purchaseDetails['rate'];
        $qty=                   $purchaseDetails['qty'];
        $amount=                $purchaseDetails['amount'];
        $debit=                 $purchaseDetails['debit'];
        $vat=                   $purchaseDetails['vat'];
        $totality=              $purchaseDetails['totality'];
        $invoicePurchaseHash=   $purchaseHash;
        $invoiceUserId=         $purchaseDetails['user_id'];

        $this->create_invoice($invoiceUserId, $invoicePurchaseHash, $title, $issueDate, $rate, $qty, $amount, $debit, $vat ,$totality);
        $invoiceDetailes= PaymentModel::return_invoice_id($purchaseHash);
        $invoiceId= $invoiceDetailes['invoice_id'];
        $this->create_customer_detailes($invoiceId, $companyName, $address, $tel, $nationalNumber, $economicCode, $postalCode );
    }

    public  function pay($purchaseHash){
        if (!isset($_SESSION['user_id'])) {
            header('location: ../user/login');
            message(fail , 'لطفا ابتدا وارد سایت شوید' , true);
            exit();
        }

        $purchase = PaymentModel::fetch_purchase_by_hash($purchaseHash);
//        $purchase = $this->fetch_purchase_by_hash($purchaseHash);
        $payed    = PaymentModel::is_purchase_payed($purchaseHash);

        if ($payed) {
            $this->success("این فاکتور قبلاً پرداخت شده و نیاز به پرداخت مجدد نیست");
        }

        if($purchase==null){
            $this->fail("</br>فرایند صدور پیش فاکتور موفقیت آمیز نبود لطفا مجدد اقدام فرمایید --- مرورگر خود را آپدیت و چنانچه از مرورگر سافاری  سیستم عامل آیفون خرید می کنید آن را تغییر دهید!!!");
        }

        $gateway = $_POST['gateway'];

        $userId = $_SESSION['user_id'];
        $info['userId'] = $purchase['user_id'];
        $info['purchaseHash']   = $purchaseHash;


        if ($userId != $info['userId']) {
            $this->fail("این شماره فاکتور متعلق به شما نیست و قابلیت پرداخت برای آن وجود ندارد");
        }

        $info['price']  = $purchase['totality'];
        if (isset($_SESSION['email'])) {
            $info['email']  =$_SESSION['email'];
        }
        $info['mobile'] = $_SESSION['mobile'];
        $info['title']  = $purchase['title'];
        if ($gateway == 'AsanPardakht'){
//            $this->asanPardakhtPaymentRequest($info);
            $this->iranKishPaymentReq($info);
        }elseif ($gateway== 'iranKish'){
            $this->iranKishPaymentReq($info);
        }
        else{
//            $this->zarinpalPaymentRequest($info);
//            $this->asanPardakhtPaymentRequest($info);
            $this->iranKishPaymentReq($info);
        }
    }



    public  function zarinpalPaymentRequest($info){
        if (!isset($_SESSION['user_id'])) {
            header('location: ../user/login');
            message(fail , 'لطفا ابتدا وارد سایت شوید' , true);
            exit();
        }

        global $config;

        $MerchantID = $config['zarinpal']['MerchantId'];
        $Amount      = $info['price']/10;
        $Description = $info['title'];
        $Email       = $info['email'];
        $Mobile      = $info['mobile'];
        $CallbackURL = fullbaseUrl() . '/payment/zarinpalVerify/'. $info['purchaseHash'];

        load_nusoap();
        $client = new SoapClient('https://www.zarinpal.com/pg/services/WebGate/wsdl', ['encoding' => 'UTF-8']);
        $result = $client->PaymentRequest([
            'MerchantID'     => $MerchantID,
            'Amount'         => $Amount,
            'Description'    => $Description,
            'Email'          => $Email,
            'Mobile'         => $Mobile,
            'CallbackURL'    => $CallbackURL,
        ]);


        {
            $authority = $result->Authority;
            $info['authority'] = $authority;
            $orderId= rand();
            $info['orderId'] = $orderId;
            $this->openTransaction($info);
        }
        if($result->Status == 100) {
            header('Location: https://www.zarinpal.com/pg/StartPay/' . $authority);
        } else {
            $this->fail('فرآیند پرداخت با خطا مواجه شد. کد خطا: ', $result->Status);
        }
    }


    public function zarinpalVerify($purchaseHash){
        global $config;

        $purchase = PaymentModel::fetch_purchase_by_hash($purchaseHash);
        if ($_GET['Status'] == 'OK'){
            $authority = $_GET['Authority'];
            $amount = $purchase['totality']/10;
            $MerchantID = $config['zarinpal']['MerchantId'];
            load_nusoap();
            $client = new SoapClient('https://www.zarinpal.com/pg/services/WebGate/wsdl', ['encoding' => 'UTF-8']);
            $result = $client->PaymentVerification([

                'MerchantID'	  => $MerchantID,
                'Authority' 	  => $authority,
                'Amount'	 	    => $amount,
            ]);


            if ($result->Status == 100){

                $info['purchase_hash'] = $purchaseHash;
                $info['reference'] = $result->RefID;
                $info['authority'] = $authority;
                $info1['userId'] = $_SESSION['user_id'];
                $info1['purchaseHash'] = $info['purchase_hash'];
                $this->closeTransactionZarinPal($info);
                // اگر payed_for برابر صفر بود یعنی این خرید برای برگه خروج است و متد های خاص قراخوانی میشود
                if($purchase['payed_for']==0){
                    $beforQty=$purchase['qty_permit'];
                    $afterQty=$purchase['qty'];
                    $info1['qty'] = $beforQty+$afterQty;
                    $this->create_permit_after_purchase($info1);
                    //دریافت شماره فاکتور قبلی بعلاوه یک و  آپدیت شماره فاکتور در جدول  Purchase
//                    $lastRecord= $this->last_record(); //دریافت شماره فاکتور قبلی
//                    $LastInvoiceId= $lastRecord['invoice_id'];  //دریافت شماره فاکتور قبلی در صورتی که payed_info برابر با عدد 0 یعنی جهت برگه خروج باشد
//                    $newInvoiceId= $LastInvoiceId+1;
//                    $this->add_purchase_invoice_id($purchaseHash, $newInvoiceId);
                    $this->invoicing($info1['purchaseHash']);     //ثبت فاکتور
                    $_SESSION['qtyPermit']=$info1['qty'];      // آپدیت تعداد برگه خروج
                }
                $this->update_payed($info1);
                $this->success('فرآیند پرداخت موفقیت آمیز بود. سند رهگیری: ' . $result->RefID);
            } else if ($result->Status == 101) {
                $this->success('فرآیند پرداخت، قبلا انجام شده و نیاز به تأیید مجدد نیست', $result->Status);
            } else {
                $this->is_purchase_not_payed($_SESSION['user_id']);
                $this->fail('فرآیند پرداخت با خطا مواجه شد. کد خطا: ', $result->Status );
            }
        } else {
            $this->is_purchase_not_payed($_SESSION['user_id']);
            $this->fail('فرآیند پرداخت توسط کاربر، لغو شد!');
        }
    }



    ///آسان پرداخت
    /// ***********************************************************

    public function asanPardakhtPaymentRequest($info){

        if (!isset($_SESSION['user_id'])) {
            header('location: ../user/login');
            message(fail , 'لطفا ابتدا وارد سایت شوید' , true);
            exit();
        }

        global $config;

        $KEY = $config['asanpardakht']['KEY'];
        $IV = $config['asanpardakht']['IV'];
        $username = $config['asanpardakht']['username'];
        $password = $config['asanpardakht']['password'];
        $WebServiceUrl = $config['asanpardakht']['WebServiceUrl'];
        $merchantConfigurationID = $config['asanpardakht']['merchantConfigurationID'];

        $orderId = rand();
        $price = $info['price'];
        $localDate = date("Ymd His");
        $additionalData = $info['title'];
        $callBackUrl = fullbaseUrl() . '/payment/asanPardakhtVerify/'. $info['purchaseHash'];
        $req = "1,{$username},{$password},{$orderId},{$price},{$localDate},{$additionalData},{$callBackUrl},0";
        $encryptedRequest = encrypt($req , $KEY , $IV);
//        var_dump($encryptedRequest);
        try {
            $opts = array('ssl' => array('verify_peer'=>false, 'verify_peer_name'=>false));
            $paramsAsan = array ('stream_context' => stream_context_create($opts));
            $client = @new soapclient($WebServiceUrl,$paramsAsan);

        }
        catch (SoapFault $E)
        {
            // echo "<div class=\"error\">{$E->faultstring}</div>";
            echo "<div class=\"error\">خطا در فراخوانی وب‌سرويس.</div>";
            exit();
        }
//var_dump($paramsAsan); no
        $paramsAsan = array(
            'merchantConfigurationID' => $merchantConfigurationID,
            'encryptedRequest' => $encryptedRequest
        );
        $result = $client->RequestOperation($paramsAsan)
        or die("<div class=\"error\">خطای فراخوانی متد درخواست تراکنش.</div>");

        $result = $result->RequestOperationResult;

        $res= explode(",",$result);
        $authority = $res[1];

        if ($result{0} == '0'){
            echo "result";
            $info['authority'] = $authority;
            $info['orderId']= $orderId;
            $this->openTransaction($info);
            sessionUp(15);

            echo "<html><script language=\"javascript\" type=\"text/javascript\">
      function RedirctToIPG(RefId) {
          var form = document.createElement(\"form\");
          form.setAttribute(\"method\", \"POST\");
          form.setAttribute(\"action\", \"https://asan.shaparak.ir/\");
          form.setAttribute(\"target\", \"_parent\");
          var hiddenField = document.createElement(\"input\");
          hiddenField.setAttribute(\"name\", \"RefId\");
          hiddenField.setAttribute(\"value\", RefId);
          form.appendChild(hiddenField);
          document.body.appendChild(form);
          form.submit();
          document.body.removeChild(form);
      } </script></html>";
            echo "<script language='javascript' type='text/javascript'>RedirctToIPG('" . substr($result,2) . "');</script>";
        }
        else{
            $this->fail('فرآیند پرداخت با خطا مواجه شد. کد خطا: ', $res[0]);
        }
    }

    public function iranKishPaymentReq($info)
    {
//        var_dump($_SESSION);
        if (!isset($_SESSION['user_id'])) {
            header('location: ../user/login');
            message(fail , 'لطفا ابتدا وارد سایت شوید' , true);
            exit();
        }

        global $config;

        $tranactionId= PaymentModel::return_last_trans_id();
        $orderId= $tranactionId['transaction_id']+1;
        $paymentId= rand(10000,1000000000000000);
        $client = new SoapClient('https://ikc.shaparak.ir/XToken/Tokens.xml', array('soap_version'   => SOAP_1_1));

        $params['amount'] = $info['price'];
        $params['merchantId'] = $config['iranKish']['merchantId'];
        $params['invoiceNo'] = $orderId;
        $params['paymentId'] =$paymentId;
//        $params['specialPaymentId'] = "123456789123";
//        $params['revertURL'] = fullbaseUrl() . '/payment/iKishVerify/'. $info['purchaseHash'];
        $params['revertURL'] = fullbaseUrl(). '/payment/iKishVerify/'. $info['purchaseHash'];
        $params['description'] = $info['title'];
        $result = $client->__soapCall("MakeToken", array($params));

        $info['authority'] = $paymentId;
        $info['orderId']= $orderId;
        $this->openTransaction($info);
        sessionUp(25);

//setcookie("PHPSESSID1", $_COOKIE['PHPSESSID'], time() + 3600  , '/');
//        setcookie('cross-site-cookie', 'name', ['samesite' => 'strict', 'secure' => true]);

        echo "    <form method=\"post\" id=\"myform\"  action=\"https://ikc.shaparak.ir/TPayment/Payment/index\">
                        <p><input type =\"hidden\" name =\"token\" value=\"".$result->MakeTokenResult->token."\" ></p>
                        <p><input type =\"hidden\" name =\"merchantId\"  value=\"".$params['merchantId']."\"></p>
                  </form>
 
         ";
        echo '<script type="text/javascript">
  document.getElementById("myform").submit();
</script>';



    }
    public function iKishVerify($purchaseHash)
    {
//        setcookie('cookie2', 'value2', ['samesite' => 'None', 'secure' => true]);
//        setcookie('PHPSESSID','/; samesite=None');
//dump($_SESSION);
        if (!isset($_SESSION['user_id'])) {
            message(fail , 'لطفا ابتدا وارد سایت شوید' , true);
            header('location: ../../user/login');
            exit();
        }
        $purchaseHash= test_input($purchaseHash);
        $purchase = PaymentModel::fetch_purchase_by_hash($purchaseHash);
//        dump($_POST);
//        dump($_GET);
        load_nusoap();
if (isset($_POST['resultCode'])) {
          $resultCode= $_POST['resultCode'];
        if( $resultCode =='100') {
            global $config;
            $client = new SoapClient('https://ikc.shaparak.ir/XVerify/Verify.xml', array('soap_version'   => SOAP_1_1));
            $client->soap_defencoding='UTF-8';
            $params['token'] =  trim($_POST["token"]); // please replace currentToken
            $params['merchantId'] = $config['iranKish']['merchantId'];
            $params['referenceNumber'] = trim($_POST['referenceId']);
            $params['sha1Key'] = $config['iranKish']['sha1Key'];
            $result = $client->__soapCall("KicccPaymentsVerification", array($params));
            $result = ($result->KicccPaymentsVerificationResult);
//            dump($result);
            $price= PaymentModel::fetch_purchase_by_hash($purchaseHash);
            $price = $price['totality'];
//            echo $price;
            if(floatval($result) == floatval($price) && floatval($result) > 0){

                //ثبت پس از وریفای
                $info['purchase_hash'] = $purchaseHash;
                $info['authority'] = test_input($_POST['paymentId']);
                $info['reference'] = test_input($_POST['referenceId']);
                $info['cardNumber'] = test_input($_POST['cardNo']);
                $info['RRN'] = "";
                $info1['userId'] = $_SESSION['user_id'];
                $this->closeTransactionAsanPardakht($info);
                // اگر payed_for برابر صفر بود یعنی این خرید برای برگه خروج است و متد های خاص قراخوانی میشود
                if($purchase['payed_for']==0 && $purchase['payed']==0){
                    //دریافت شماره فاکتور قبلی بعلاوه یک و  آپدیت شماره فاکتور در جدول  Purchase
                    $info1['purchaseHash'] = $info['purchase_hash'];
                    $beforQty=$purchase['qty_permit'];
                    $afterQty=$purchase['qty'];
                    $info1['qty'] = $beforQty+$afterQty;
                    $info1['userId'] = $_SESSION['user_id'];
                    $this->create_permit_after_purchase($info1);
//                $userId= $_SESSION['user_id'];
//                $lastRecord= $this->last_record(); //دریافت شماره فاکتور قبلی
//                $LastInvoiceId= $lastRecord['invoice_id'];  //دریافت شماره فاکتور قبلی در صورتی که payed_info برابر با عدد 0 یعنی جهت برگه خروج باشد
//                $newInvoiceId= $LastInvoiceId+1;
//                $this->add_purchase_invoice_id($purchaseHash, $newInvoiceId);
                    $this->invoicing($info1['purchaseHash']);     //ثبت فاکتور
                    // آپدیت سشن تعداد برگه خروج
                    $_SESSION['qtyPermit']=$info1['qty'];
                }
                if( $purchase['payed']==0) {
                    $this->update_payed($info1);
                }
                $mss = ' عمليات پرداخت با موفقيت به پايان رسيد .<br><br>جهت پيگيري هاي آتی شماره رسيد پرداخت خود را ياداشت فرماييد : '.$params['referenceNumber'].'<hr>'
                .'<a href="/financial/invoice/1" class="btn btn-sm btn-default ">نمایش فاکتور</a>';
                $this->success($mss);
                exit();
            }else{
                $mss = 'کاربر گرامي ، عمليات  اعتبار سنجي پرداخت شما با خطا مواجه گرديد .<br> مبلغ واریز با قیمت محصول برابر نیست<br>';
                $this->fail($mss);
                exit();
            }
        }else{
            $this->fail('', iranKishShowStatus($resultCode));
        }
    }
    }

    public function asanPardakhtVerify($purchaseHash){
        if (!isset($_SESSION['user_id'])) {
            header('location: ../user/login');
            message(fail , 'لطفا ابتدا وارد سایت شوید' , true);
            exit();
        }
        $purchaseHash = test_input($purchaseHash);
        global $config;

        $purchase = PaymentModel::fetch_purchase_by_hash($purchaseHash);

        header('Content-Type: text/html; charset=utf-8');

        $KEY = $config['asanpardakht']['KEY'];
        $IV = $config['asanpardakht']['IV'];
        $username = $config['asanpardakht']['username'];
        $password = $config['asanpardakht']['password'];
        $WebServiceUrl = $config['asanpardakht']['WebServiceUrl'];
        $merchantConfigurationID = $config['asanpardakht']['merchantConfigurationID'];
        $ReturningParams = $_POST['ReturningParams'];
        $ReturningParams = decrypt($ReturningParams, $KEY, $IV);

        $RetArr = explode(",", $ReturningParams);
//        dump($RetArr);
        $Amount = $RetArr[0];
        $SaleOrderId = $RetArr[1];
        $RefId = $RetArr[2];
        $ResCode = $RetArr[3];
        if ($ResCode =="911") {
            $this->is_purchase_not_payed($_SESSION['user_id']);
            $this->fail('فرآیند پرداخت توسط کاربر، لغو شد!');
            exit();
        } elseif ($ResCode != '0' && $ResCode != '00') {
            $this->is_purchase_not_payed($_SESSION['user_id']);
            $this->fail("تراکنش ناموفق<br>خطای شماره: '.$ResCode;");
            exit();
        }
        $ResMessage = explode(":", $RetArr[4]);
//        dump($ResMessage);
        $sixDigits= $ResMessage[1];
        $lastFourDigitsOfPAN= $RetArr[7];
        $cardNumber= $sixDigits."****".$lastFourDigitsOfPAN;
        $PayGateTranID = $RetArr[5];
        $RRN = $RetArr[6];


        try {
            $opts = array('ssl' => array('verify_peer'=>false, 'verify_peer_name'=>false));
            $params = array ('stream_context' => stream_context_create($opts));
            $client = @new soapclient($WebServiceUrl,$params);
        }
        catch (SoapFault $E)
        {
            // echo $E->faultstring;
            $this->fail("خطا در فراخوانی وب‌سرويس.");
            exit();
        }

        $encryptedCredintials = encrypt("{$username},{$password}", $KEY, $IV);
        $params = array(
            'merchantConfigurationID' => $merchantConfigurationID,
            'encryptedCredentials' => $encryptedCredintials,
            'payGateTranID' => $PayGateTranID
        );

//Verify
        $result = $client->RequestVerification($params)
        or die("خطای فراخوانی متد وريفای.");
        $result = $result->RequestVerificationResult;

        if ($result == '504'){
            $this->success(' فرآیند پرداخت، قبلا انجام شده و نیاز به تأیید مجدد نیست- کد پیگیری:', $PayGateTranID);
            exit();
        }elseif ($result != '500'){
            $this->fail("خطای شماره: '. $result . ' در هنگام Verify");
            exit();
        }
        else{
//        echo('<div style="width:250px; margin:100px auto; direction:rtl; font:bold 14px Tahoma">تراکنش با موفقيت Verify شد.</div>');
            //ثبت پس از وریفای
            $info['purchase_hash'] = $purchaseHash;
            $info['authority'] = $RefId;
            $info['reference'] = $PayGateTranID;
            $info['cardNumber'] = $cardNumber;
            $info['RRN'] = $RRN;
            $info1['userId'] = $_SESSION['user_id'];
            $this->closeTransactionAsanPardakht($info);
            // اگر payed_for برابر صفر بود یعنی این خرید برای برگه خروج است و متد های خاص قراخوانی میشود
            if($purchase['payed_for']==0){
                //دریافت شماره فاکتور قبلی بعلاوه یک و  آپدیت شماره فاکتور در جدول  Purchase
                $info1['purchaseHash'] = $info['purchase_hash'];
                $beforQty=$purchase['qty_permit'];
                $afterQty=$purchase['qty'];
                $info1['qty'] = $beforQty+$afterQty;
                $info1['userId'] = $_SESSION['user_id'];
                $this->create_permit_after_purchase($info1);
//                $userId= $_SESSION['user_id'];
//                $lastRecord= $this->last_record(); //دریافت شماره فاکتور قبلی
//                $LastInvoiceId= $lastRecord['invoice_id'];  //دریافت شماره فاکتور قبلی در صورتی که payed_info برابر با عدد 0 یعنی جهت برگه خروج باشد
//                $newInvoiceId= $LastInvoiceId+1;
//                $this->add_purchase_invoice_id($purchaseHash, $newInvoiceId);
                $this->invoicing($info1['purchaseHash']);     //ثبت فاکتور
                // آپدیت سشن تعداد برگه خروج
                $_SESSION['qtyPermit']=$info1['qty'];
            }
            $this->update_payed($info1);
//        $this->success("تراکنش با موفقیت verify شد");
//        echo('<div style="width:250px; margin:100px auto; direction:rtl; font:bold 14px Tahoma">تراکنش با موفقيت Verify شد.</div>');
        }

//Settlment
        $result = $client->RequestReconciliation($params)
        or die("خطای فراخوانی متد تسويه.");

        $result = $result->RequestReconciliationResult;
        if ($result != '600'){
            echo('خطای شماره: '. $result . ' در هنگام Settlement');
            exit();
        }
        else{
//        echo('<div style="width:250px; margin:100px auto; direction:rtl; font:bold 14px Tahoma">تراکنش با موفقيت Settlement شد.</div>');
        }

//    echo('<div style="width:250px; margin:100px auto; direction:rtl; font:bold 14px Tahoma">تراکنش با موفقيت انجام پذيرفت.</div>');
        $this->success('فرآیند پرداخت موفقیت آمیز بود. سند رهگیری: ' . $PayGateTranID);
    }

}