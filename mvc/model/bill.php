<?php
class BillModel {


    public static function fetch_bill_by_userId($userId) {
        $db = db::getInstance();
        $record= $db->query("SELECT * FROM s_water_bill WHERE user_id=:userId" , array(
            'userId' => $userId,
        ));
        return $record;
    }

//    public static function catalogByPage($userId, $startIndex, $countPage) {
//        $db = db::getInstance();
//        $record= $db->query("SELECT * FROM s_water_bill LEFT OUTER JOIN s_purchase ON s_purchase.purchase_hash=s_water_bill.water_bill_hash LEFT OUTER JOIN s_transaction ON s_transaction.hash=s_purchase.purchase_hash WHERE s_water_bill.user_id=:userId  AND s_transaction.reference IS NOT NULL LIMIT $startIndex , $countPage ", array(
//            'userId'       => $userId ,
//            'startIndex'   => $startIndex ,
//            'countPage'    => $countPage ,
//        ));
//        return $record;
//    }
    public static function catalogByPage($userId, $startIndex, $countPage) {
        $db = db::getInstance();
        $record= $db->query("SELECT * FROM s_water_bill LEFT OUTER JOIN s_transaction ON s_transaction.hash=s_water_bill.water_bill_hash AND s_transaction.payed=1 
              LEFT JOIN s_bill_payed_bank ON s_water_bill.shenase_pardakht=s_bill_payed_bank.b_shenase_pardakht AND s_water_bill.shenase_ghabz=s_bill_payed_bank.b_shenase_ghabz 
              WHERE s_water_bill.user_id=:userId LIMIT $startIndex , $countPage ", array(
            'userId'       => $userId ,
            'startIndex'   => $startIndex ,
            'countPage'    => $countPage ,
        ));
        return $record;
    }
    public static function fetch_pay_by_shenase($shenaseGhabz, $shenasePardakht){
        $db = db::getInstance();
        $record=$db->query("SELECT * FROM `s_bill_payed_bank` WHERE `b_shenase_ghabz`=:shenaseGhabz AND `b_shenase_pardakht`=:shenasePardakht ", array(
            'shenaseGhabz'       => $shenaseGhabz ,
            'shenasePardakht'    => $shenasePardakht ,
        ));
        return $record;
    }
    public static function return_rrn($userId, $hash) {
        $db = db::getInstance();
        $record= $db->query("SELECT * FROM `s_transaction` WHERE user_id=:userId AND hash=:hash AND reference IS NOT NULL;   ", array(
            'userId'       => $userId ,
            'hash'       => $hash ,
        ));
        return $record;
    }


    public static function count($userId){

        $db = Db::getInstance();
        $records = $db->query("SELECT COUNT(*) AS total FROM s_water_bill WHERE user_id=:userId" , array(
            'userId' => $userId,
        ));
        return $records[0]['total'];
    }

    public static function fetch_water_by_hash($waterBillHash) {
        $db = Db::getInstance();
        $record = $db->first("SELECT * FROM s_water_bill LEFT OUTER JOIN s_company ON s_water_bill.user_id=s_company.user_id WHERE s_water_bill.water_bill_hash=:waterHash", array(
            'waterHash' => $waterBillHash,
        ));
        return $record;
    }
}