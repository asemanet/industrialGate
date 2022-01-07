<?php
class PermitController {
  private function success($message, $code = '') {
    message('success', $message . $code, true);
  }

  private function fail($message, $code = '') {
    message('fail', $message . $code, true);
  }

  public function purchase() {
//      var_dump($_SESSION);
//      تست یوزر خواص
//      if ($_SESSION['user_id'] != '2547') {
//          message("fail", 'در حال ارتقا هستیم لطفا چند لحظه دیگر امتحان کنید و یا با من تماس بگیرید 09124061318 فرهاد آقاساقلو', true);
//      }
    if (!isset($_SESSION['user_id'])) {
      header('location:' . fullbaseUrl() . '/user/login');
      message("fail", 'لطفا ابتدا وارد سایت شوید', true);
      exit();
    }
      if (!isset($_SESSION['company_name'])) {
          message("fail", '<span>لطفا اطلاعات <a href="/profile/contact">این فرم </a> را تکمیل فرمایید.</span>', true);
      }
//    $session_user_id = $_SESSION['user_id'];
    $recordUserId = UserModel::fetch_by_company($_SESSION['user_id']);
    if (isset($_POST['purchase'])) {
      $this->submitPurchase();
        sessionUp(25);
    } else {
      view::render("/permit/purchase.php", $recordUserId);
    }
  }

  private function submitPurchase() {
    header('Content-type: text/html; charset=utf-8');
    $userId = $_SESSION['user_id'];
    $qty = test_input($_POST['qty']);
    global $config;
    $rate = $config['permitRate'];
    $vatRate = $config['vatRate'];
    $amount = $qty * $rate;
    $vat = $amount * $vatRate;
    $vat = $vat / 100;
    $totality = $amount + $vat;
    $issueDate = jdate(" Y-m-d H:i:s ");
    $title = "خرید برگه خروج شرکت " . $_SESSION['company_name'] .$_SESSION['contract_number']."-". "  تعداد  " . $qty . "عدد";
    $purchase_hash = generateHash(32);
    $payed = 0;
    $payedFor = 0;  //عدد صفر یعنی پرداختی بابت برگه خروج
    $debit= 0;
      PaymentModel::create_purchase($userId, $purchase_hash, $payedFor, $totality, $title, $qty, $rate, $amount, $debit, $vat, $issueDate, $payed );
    $pay = new PaymentController();
    $pay->pay($purchase_hash);
      sessionUp(15);
  }


//    ثبت پلاک  ************************
  public function issue() {
    if (!isset($_SESSION['user_id'])) {
      header('location:' . fullbaseUrl() . '/user/login');
      message(fail, 'لطفا ابتدا وارد سایت شوید', true);
      exit();
    }
      if (!isset($_SESSION['company_name'])) {
          message("fail", '<span>لطفا اطلاعات <a href="/profile/contact">این فرم </a> را تکمیل فرمایید.</span>', true);
      }
      sessionUp(15);


      $session_user_id = $_SESSION['user_id'];
    $recordUserId = UserModel::fetch_by_company($session_user_id);
    if ($recordUserId['qty_permit'] <= 0) {
      $this->fail("شما برگه خروج ندارید لطفا نسبت به 
<a href=\"/permit/purchase\"> <u>خرید</u></a>
 اقدام فرمایید");
    } elseif (isset($_POST['issue'])) {
      $this->submitDone();
        sessionUp(15);
    } else {
      View::render("/permit/issue.php", $recordUserId);
    }
  }

  private function submitDone() {
    $licensePlate = 'ایران' . test_input($_POST['ir']) . " " . test_input($_POST['threeDigit']) . test_input($_POST['letter']) . test_input($_POST['twoDigit']);
    $issueDate = jdate('Y-m-d H:i:s');
    $cargo = test_input($_POST['cargo']);
    $driverName = test_input($_POST['driver_name']);
    $carType = test_input($_POST['car_type']);
    $exitDone = 0;
    $exitPermitHash = generateHash(32);
//چک کردن عدد تکراری در فانکشن زیر
//    $permitRand= hasPermitRand(rand(111,99999999)); //اگر عدد 8 رقمی تکراری نبود ثبت می شود
    $permitRand= rand(111,99999999); //اگر عدد 8 رقمی تکراری نبود ثبت می شود

      $userId = $_SESSION['user_id'];
      $recordDone = array(
      'licensePlate' => $licensePlate,
      'issueDate' => $issueDate,
      'cargo' => $cargo,
      'driverName' => $driverName,
      'carType' => $carType,
      'exitPermitHash' => $exitPermitHash,
      'userId' => $userId,
      'permitRand' => $permitRand
    );

    PermitModel::permit_issue($licensePlate, $issueDate, $cargo, $driverName, $carType, $exitDone, $exitPermitHash, $userId , $permitRand);
    PermitModel::newQtyPermit($_SESSION['user_id']);
      header('Location: /permit/permitPrint/'.$exitPermitHash);
      sessionUp(15);
  }


  public function permitPrint($exitPermitHash)
  {
      $exitPermitHash=test_input($exitPermitHash);
      $recordDone= PermitModel::fetch_permit_by_hash($exitPermitHash);
      View::render("/permit/issue-done.php", $recordDone);
      sessionUp(15);
  }



// گزارش **********************

  public function catalog1($pageIndex){
    if (!isset($_SESSION['user_id'])){
      header('location:' . fullbaseUrl() . '/user/login');
      exit;
    }
      if ($pageIndex<=0){
          $pageIndex==1;
          return $pageIndex;
      }
    $userId = $_SESSION['user_id'];
    $countPage = 50;
    $startIndex = ($pageIndex-1) * $countPage;
    $data['records'] = PermitModel::catalogByPage($userId, $startIndex, $countPage);
    $recordsCount = PermitModel::countPermit($userId);
    $data['pageCount'] = ceil($recordsCount / $countPage);
    $data['pageIndex'] = $pageIndex;
      View::render("/permit/catalog1.php", $data);
      sessionUp(15);
  }
    private function fetch_permit($userId) {
        $data= PermitModel::catalog($userId);
        return $data;
    }


  public function catalogAjax(){
    if (!isset($_SESSION['user_id'])){
      header('location:' . fullbaseUrl() . '/user/login');
      exit;
    }
    $userId = $_SESSION['user_id'];
    $data = PermitModel::catalog($userId);
      View::render("/permit/catalog-ajax.php",$data);
      sessionUp(15);
  }
  public function catalog(){
      if (!isset($_SESSION['user_id'])) {
          header('location:' . fullbaseUrl() . '/user/login');
          message(fail, 'لطفا ابتدا وارد سایت شوید', true);
          exit();
      }
      if (!isset($_SESSION['company_name'])) {
          message("fail", '<span>لطفا اطلاعات <a href="/profile/contact">این فرم </a> را تکمیل فرمایید.</span>', true);
      }

    $userId = $_SESSION['user_id'];
    $data = PermitModel::catalog($userId);
      View::render("/permit/catalog-server-side.php",$data);
      sessionUp(15);
  }

  //datatables serverside
  public function catalogServerSide(){
      if (!isset($_SESSION['user_id'])) {
          header('location:' . fullbaseUrl() . '/user/login');
          message(fail, 'لطفا ابتدا وارد سایت شوید', true);
          exit();
      }
      if (!isset($_SESSION['company_name'])) {
          message("fail", '<span>لطفا اطلاعات <a href="/profile/contact">این فرم </a> را تکمیل فرمایید.</span>', true);
      }


    if (!isset($_SESSION['user_id'])){
      header('location:' . fullbaseUrl() . '/user/login');
      exit;
    }
      // DB table to use
      $table = 's_exit_permit';

// Table's primary key
      $primaryKey = 'exit_permit_id';

// Array of database columns which should be read and sent back to DataTables.
// The `db` parameter represents the column name in the database, while the `dt`
// parameter represents the DataTables column identifier - in this case object
// parameter names
      $columns = array(
          array(
              'db' => 'exit_permit_id',
              'dt' => 'DT_RowId',
              'formatter' => function( $d, $row ) {
                  // Technically a DOM id cannot start with an integer, so we prefix
                  // a string. This can also be useful if you have multiple tables
                  // to ensure that the id is unique with a different prefix
                  return 'row_'.$d;
              }
          ),
          array( 'db' => 'license_plate',  'dt' => 'license_plate' ),
          array( 'db' => 'cargo'        ,  'dt' => 'cargo' ),
          array( 'db' => 'driver_name'  ,  'dt' => 'driver_name' ),
          array( 'db' => 'issue_date'   ,  'dt' => 'issue_date' ),
          array( 'db' => 'due_date'     ,  'dt' => 'due_date' ),
          array( 'db' => 'car_type'     ,  'dt' => 'car_type' ),
          array( 'db' => 'exit_done'    ,  'dt' => 'exit_done' ),
          array( 'db' => 'permit_rand'  ,  'dt' => 'permit_rand' ),
          array( 'db' => 'exit_permit_hash'  ,  'dt' => 'exit_permit_hash' ),
      );
      global $config;
      $sql_details = array(
          'user' => $config ['db']['user'],
          'pass' => $config ['db']['pass'],
          'db'   => $config ['db']['name'],
          'host' => $config ['db']['host'],
      );


      /* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
       * If you just want to use the basic configuration for DataTables with PHP
       * server-side, there is no need to edit below this line.
       */

        $where="user_id"."=".$_SESSION['user_id'];
      $extra ='ORDER BY exit_permit_id DESC';
      echo json_encode(
          SSP::complex( $_POST, $sql_details, $table, $primaryKey, $columns, null ,$where, $extra )
      );
  }


    public function ajaxCatalog(){
        $userId = $_SESSION['user_id'];
        $data= $this->fetch_permit($userId);
        $data=json_encode($data);
        echo $data;
    }











}