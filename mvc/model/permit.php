<?php
class PermitModel {

  public static function create_permit_after_purchase($userId, $purchaseHash, $qty ) {
    $db = Db::getInstance();
    $db->modify("UPDATE s_company SET qty_permit=:qty WHERE user_id=:userId", array(
        'qty'    =>$qty ,
        'userId' =>$userId ,
    ));
      $db->modify("UPDATE  s_purchase SET payed=1 WHERE purchase_hash=:purchaseHash", array(
          'purchaseHash' => $purchaseHash,
      ));
  }

  public static function update_payed($purchaseHash) {
      $db = Db::getInstance();
      $db->modify("UPDATE  s_purchase SET payed=1 WHERE purchase_hash=:purchaseHash", array(
          'purchaseHash' => $purchaseHash,
      ));
  }

  public static function permit_issue($licensePlate,$issueDate, $cargo, $driverName, $carType, $exitDone, $exitPermitHash, $userId , $permitRand) {
    $db = Db::getInstance();
    $db->insert("INSERT INTO s_exit_permit (user_id, exit_permit_hash, issue_date, license_plate, cargo, driver_name, car_type, exit_done , permit_rand) 
      VALUES (:userId, :exitPermitHash, :issueDate, :licensePlate, :cargo, :driverName, :carType, :exitDone , :permitRand )" , array(
        'userId'         => $userId ,
        'exitPermitHash' => $exitPermitHash ,
        'issueDate'      => $issueDate ,
        'licensePlate'   => $licensePlate ,
        'cargo'          => $cargo ,
        'driverName'     => $driverName ,
        'carType'        => $carType ,
        'exitDone'       => $exitDone ,
        'permitRand'     => $permitRand,
    ));
      $db->insert("INSERT INTO s_check_permit (user_id, exit_permit_hash, issue_date, license_plate, cargo, driver_name, car_type, exit_done , permit_rand) 
      VALUES (:userId, :exitPermitHash, :issueDate, :licensePlate, :cargo, :driverName, :carType, :exitDone , :permitRand )" , array(
          'userId'         => $userId ,
          'exitPermitHash' => $exitPermitHash ,
          'issueDate'      => $issueDate ,
          'licensePlate'   => $licensePlate ,
          'cargo'          => $cargo ,
          'driverName'     => $driverName ,
          'carType'        => $carType ,
          'exitDone'       => $exitDone ,
          'permitRand'     => $permitRand,
      ));

  }
  public static function newQtyPermit($userId) {
//    $newQtyPermit = $_SESSION['qtyPermit']-1;
      $db = Db::getInstance();
      $qtyPermit = $db->query("SELECT `qty_permit` FROM `s_company` WHERE user_id=:userId",array(
          'userId' =>$userId ,
      )) ;
      $newQtyPermit= $qtyPermit[0]['qty_permit']-1;
    $db->modify("UPDATE s_company SET qty_permit=:newQtyPermit WHERE user_id=:userId", array(
        'newQtyPermit' =>$newQtyPermit ,
        'userId' =>$userId ,
    ));
    $_SESSION['qtyPermit'] = $newQtyPermit;
  }

  public static function fetch_permit_by_hash($hash) {
    $db = Db::getInstance();
    $record = $db->first("SELECT * FROM s_exit_permit LEFT OUTER JOIN s_company ON s_exit_permit.user_id=s_company.user_id WHERE s_exit_permit.exit_permit_hash=:hash", array(
        'hash' => $hash,
    ));
    return $record;
  }

  public static function fetch_permit_by_userId($userId) {
    $db = db::getInstance();
    $record= $db->query("SELECT * FROM s_exit_permit WHERE user_id=:userId" , array(
        'userId' => $userId,
    ));
    return $record;
  }

  public static function catalogByPage($userId, $startIndex, $countPage) {

    $db = db::getInstance();
    $record= $db->query("SELECT * FROM  s_exit_permit  WHERE user_id=:userId ORDER BY exit_permit_id DESC LIMIT $startIndex , $countPage  ", array(
        'userId'       => $userId ,
        'startIndex'   => $startIndex ,
        'countPage'    => $countPage ,
    ));

    return $record;
  }

    public static function catalog($userId) {

        $db = db::getInstance();
        $record= $db->query("SELECT `license_plate`,`cargo`,`driver_name`,`issue_date`,`due_date`,`car_type`,`exit_done`,`permit_rand` FROM  s_exit_permit  WHERE user_id=:userId ORDER BY exit_permit_id DESC ", array(
            'userId'       => $userId ,
        ));

        return $record;
    }

  public static function fetchPermitRand($permitRand) {
      $db = db::getInstance();
      $record= $db->query("SELECT * FROM s_exit_permit WHERE permit_rand=:permitRand" , array(
          'permitRand' => $permitRand,
      ));
      return $record;
  }

  public static function countPermit($userId){
    $db = Db::getInstance();
    $records = $db->query("SELECT COUNT(*) AS total FROM s_exit_permit WHERE user_id=:userId" , array(
        'userId' => $userId,
    ));
    return $records[0]['total'];
  }
}





