<?php
class PaymentModel {

    public static function openTransaction($price , $userId, $authority , $purchaseHash , $orderId) {
        $db = Db::getInstance();
        $creationTime= jdate(" Y-m-d H:i:s ");

        $db->insert("INSERT INTO s_transaction (price , creationTime , user_id, authority , payed , order_id , hash) VALUES (:price , :creationTime , :userId , :authority , 0 , :orderId , :purchaseHash)" , array(
            'price'        => $price ,
            'creationTime' => $creationTime ,
            'userId'       => $userId ,
            'authority'    => $authority ,
            'orderId'      => $orderId ,
            'purchaseHash' => $purchaseHash ,
        ));
    }



    public static function closeTransactionZarinPal($authority , $reference) {
        $db = Db::getInstance();
        $paymentTime= jdate(" Y-m-d H:i:s ");
        $db->modify("UPDATE s_transaction SET reference=:reference , payed=1 , paymentTime=:paymentTime WHERE authority=:authority" , array(
            'reference'      => $reference ,
            'paymentTime'    => $paymentTime ,
            'authority'      => $authority ,
        ));
    }

    public static function closeTransactionAsanPardakht($authority , $reference , $cardNumber , $RRN) {
        $db = Db::getInstance();
        $paymentTime= jdate(" Y-m-d H:i:s ");
        $db->modify("UPDATE s_transaction SET reference=:reference , payed=1 , paymentTime=:paymentTime , card_number=:cardNumber , rrn=:RRN WHERE authority=:authority" , array(
            'reference'    => $reference ,
            'paymentTime'  => $paymentTime ,
            'cardNumber'   => $cardNumber ,
            'RRN'          => $RRN ,
            'authority'    => $authority ,
        ));
    }

    public static function fetch_purchase_by_hash($purchaseHash) {
        $db = Db::getInstance();
        $record = $db->first("SELECT * FROM s_purchase LEFT OUTER JOIN s_company ON s_purchase.user_id=s_company.user_id WHERE s_purchase.purchase_hash=:purchaseHash", array(
            'purchaseHash' => $purchaseHash,
        ));
        return $record;
    }

    public static function fetch_by_user_id($userId) {
        $db = Db::getInstance();
        $record = $db->first("SELECT * FROM s_company where user_id=:userId", array(
            'userId' => $userId,
        ));
        return $record;
    }

    public static function return_invoice_id($purchaseHash) {
        $db = Db::getInstance();
        $record = $db->first("SELECT * FROM s_invoice where purchase_hash=:purchaseHash", array(
            'purchaseHash' => $purchaseHash,
        ));
        return $record;
    }

    public static function create_purchase($userId, $purchase_hash, $payedFor, $totality, $title, $qty, $rate, $amount, $debit, $vat, $issueDate , $payed ){
        $db = Db::getInstance();
        if (!isset($title)){
            $title = 'یک فاکتور تستی';
        }
        $db->modify("DELETE FROM s_purchase WHERE payed=0 AND user_id=:userId", array(
            'userId' => $userId,
        ));
        $db->insert("INSERT INTO s_purchase (user_id, purchase_hash,  payed_for, title,  issue_date, rate,  qty,  amount, debit, vat,  totality ,  payed )
                                     VALUES (:userId, :purchase_hash, :payedFor, :title, :issueDate, :rate, :qty, :amount, :debit, :vat, :totality , :payed )" , array(
            'userId'        => $userId ,
            'purchase_hash' => $purchase_hash ,
            'payedFor'      => $payedFor ,
            'title'         => $title ,
            'issueDate'     => $issueDate ,
            'rate'          => $rate ,
            'qty'           => $qty ,
            'amount'        => $amount ,
            'debit'         => $debit,
            'vat'           => $vat ,
            'totality'      => $totality ,
            'payed'         => $payed ,
        ));
    }

    public static function is_purchase_not_payed($userId){
        $db = Db::getInstance();
        $db->modify("DELETE FROM s_purchase WHERE payed=0 AND user_id=:userId", array(
            'userId' => $userId,
        ));
    }

    public static function is_purchase_payed($purchaseHash) {
        $db = Db::getInstance();
        $record = $db->first("SELECT * FROM s_purchase LEFT OUTER JOIN s_transaction ON s_purchase.purchase_hash=s_transaction.hash WHERE s_purchase.purchase_hash=:purchaseHash" , array(
            'purchaseHash' => $purchaseHash ,
        ));
        return $record['payed'];
    }

    public static function is_waterBill_payed($waterHash) {
        $db = Db::getInstance();
        $record = $db->first("SELECT * FROM s_water_bill LEFT OUTER JOIN s_transaction ON s_water_bill.water_bill_hash=s_transaction.hash WHERE s_water_bill.water_bill_hash=:waterHash" , array(
            'waterHash' => $waterHash ,
        ));
        return $record['payed'];
    }

    public static function last_record(){
        $db = Db::getInstance();
        $record = $db->first("SELECT * FROM s_purchase WHERE  payed=1 AND payed_for=0 ORDER BY purchase_id DESC LIMIT 1");
        return $record;
    }

    public static function add_purchase_invoice_id($purchaseHash, $newInvoiceId){
        $db = Db::getInstance();
        $db->modify("UPDATE  s_purchase SET invoice_id=:newInvoiceId WHERE purchase_hash=:purchaseHash" , array(
            'purchaseHash' => $purchaseHash ,
            'newInvoiceId' => $newInvoiceId
        ));
    }

    public static function create_invoice($invoiceUserId, $invoicePurchaseHash, $title, $issueDate, $rate, $qty, $amount, $debit, $vat ,$totality ){
        $db = Db::getInstance();
        if (!isset($title)){
            $title = 'یک فاکتور تستی';
        }

        $db->insert("INSERT INTO s_invoice (user_id, purchase_hash, title,  issue_date, rate,  qty,  amount, debit, vat,  totality  )
                                     VALUES (:userId, :purchase_hash, :title, :issueDate, :rate, :qty, :amount, :debit, :vat, :totality  )" , array(
            'userId'        => $invoiceUserId ,
            'purchase_hash' => $invoicePurchaseHash ,
            'title'         => $title ,
            'issueDate'     => $issueDate ,
            'rate'          => $rate ,
            'qty'           => $qty ,
            'amount'        => $amount ,
            'debit'         => $debit,
            'vat'           => $vat ,
            'totality'      => $totality ,
        ));
    }

    public static function create_customer_detailes($invoiceId, $companyName, $address, $tel, $nationalNumber, $economicCode, $postalCode ){
        $db = Db::getInstance();

        $db->insert("INSERT INTO s_customer_detailes (invoice_id, company_name, address,  tel, national_number,  economic_code, postal_code )
                                     VALUES (:InvoiceId, :companyName, :address, :tel, :nationalNumber, :economicCode, :postalCode)" , array(
            'InvoiceId'        => $invoiceId ,
            'companyName'      => $companyName ,
            'address'          => $address ,
            'tel'              => $tel ,
            'nationalNumber'   => $nationalNumber ,
            'economicCode'     => $economicCode ,
            'postalCode'       => $postalCode,
        ));
    }

    public static function create_permit_after_purchase($userId, $purchaseHash, $qty) {
        $db = Db::getInstance();
        $db->modify("UPDATE s_company SET qty_permit=:qty WHERE user_id=:userId" , array(
            'userId' => $userId ,
            'qty'    => $qty ,
        ));
        $db->modify("UPDATE  s_purchase SET payed=1 WHERE purchase_hash=:purchaseHash" , array(
            'purchaseHash' => $purchaseHash ,
        ));
    }
    public static function return_last_trans_id()
    {
        $db = Db::getInstance();
        return $db->first("SELECT `transaction_id` FROM `s_transaction` ORDER BY s_transaction.transaction_id DESC ");
    }
}







//
//  public static function close_transaction($reference, $invoiceHash){
//    $db = Db::getInstance();
//    $time = date("Y-m-d H:m:s");
//    $db->modify("UPDATE x_transaction SET reference='$reference', payed=1, paymentTime='$time' WHERE invoice_hash='$invoiceHash'");
//  }
//
//  public static function fetch_invoice_by_hash($invoiceHash) {
//    $db = Db::getInstance();
//    $record = $db->first("SELECT * FROM x_invoice LEFT OUTER JOIN x_user ON x_invoice.user_id=x_user.user_id WHERE x_invoice.hash='$invoiceHash'");
//    return $record;
//  }
//
//  public static function create_invoice($userId, $price, $startDate, $endDate, $title = null){
//    $db = Db::getInstance();
//    $hash = generateHash(32);
//    if (!isset($title)){
//      $title = 'یک فاکتور تستی';
//    }
//    $db->insert("INSERT INTO x_invoice (user_id, price, startDate, endDate, hash, title) VALUES ($userId, $price, '$startDate', '$endDate', '$hash', '$title')");
//  }
//
//  public static function is_invoice_payed($invoiceHash) {
//    $db = Db::getInstance();
//    $record = $db->first("SELECT * FROM x_invoice LEFT OUTER JOIN x_transaction ON x_invoice.hash=x_transaction.invoice_hash WHERE x_invoice.hash='$invoiceHash'");
//    return $record['payed'];
//  }
//
//  public static function fetch_pending_invoices($userId){
//    $db = Db::getInstance();
//    $records = $db->query("SELECT x_invoice.* FROM x_invoice LEFT OUTER JOIN x_transaction ON x_invoice.hash=x_transaction.invoice_hash WHERE x_invoice.user_id=$userId AND (x_transaction.payed IS NULL OR x_transaction.payed = 0)");
//    return $records;
//  }
//
//  public static function found_payed_invoice_for_current_date($userId){
//    $db = Db::getInstance();
//    $date = date("Y-m-d");
//
//    $record = $db->first("SELECT x_invoice.* FROM x_invoice LEFT OUTER JOIN x_transaction ON x_invoice.hash=x_transaction.invoice_hash WHERE x_invoice.user_id=$userId AND x_transaction.payed=1 AND x_invoice.startDate<'$date' AND x_invoice.endDate>'$date'");
//    return $record != null;
//  }
//}