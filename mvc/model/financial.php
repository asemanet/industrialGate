<?php
class FinancialModel {

    public static function fetch_purchase_by_userId($userId) {
        $db = db::getInstance();
        $record= $db->query("SELECT * FROM s_purchase WHERE user_id=:userId" , array(
            'userId' => $userId,
        ));
        return $record;
    }

    public static function catalogByPage($userId, $startIndex, $countPage) {

        $db = db::getInstance();
        $record= $db->query("SELECT * FROM  s_invoice  LEFT OUTER JOIN s_transaction ON s_invoice.purchase_hash=s_transaction.hash LEFT OUTER JOIN s_customer_detailes ON s_invoice.invoice_id=s_customer_detailes.invoice_id WHERE s_invoice.user_id=:userId  LIMIT $startIndex , $countPage ", array(
            'userId'       => $userId ,
            'startIndex'   => $startIndex ,
            'countPage'    => $countPage ,
        ));
        return $record;
    }


    public static function countPermit($userId){
        $db = Db::getInstance();
        $records = $db->query("SELECT COUNT(*) AS total FROM s_purchase WHERE user_id=:userId" , array(
            'userId' => $userId,
        ));
        return $records[0]['total'];
    }
}