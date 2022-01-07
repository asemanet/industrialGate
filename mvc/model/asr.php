<?php

use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
require_once ('includes/phpOffice/autoload.php');

class AsrModel
{

    public static function fetch_bill_by_contract_number($contractNumber)
    {
        $db = db::getInstance();
        $record = $db->query("SELECT * FROM s_company WHERE contract_number=:contractNumber", array(
            'contractNumber' => $contractNumber,
        ));
        return $record;
    }

    public static function fetch_company_name_by_contract($contractNumber)
    {
        $db = db::getInstance();
        $record = $db->first("SELECT contract_name FROM s_company WHERE contract_number=:contractNumber", array(
            'contractNumber' => $contractNumber,
        ));
        return $record;
    }

    public static function fetch_bill_by_period_id($periodId)
    {
        $db = db::getInstance();
        $record = $db->query("SELECT * FROM s_water_bill WHERE period_id=:periodId ORDER BY water_bill_id DESC LIMIT 1", array(
            'periodId' => $periodId,
        ));
        return $record;
    }

    public static function water_billing($userId, $contractNumber, $companyName, $address, $ShenaseGhabz, $ShenasePardakht, $MizanMasraf, $Nerkh, $Aboneman, $khadamatAbresani, $MablaghMaliat, $GhabelPardakht, $CodeQabz, $Shomare, $AzTarikh, $TaTarikh, $AbBaha, $MohlatPardakht, $NameDoreh, $BedehiQ, $CodePosti, $ShContorQabli, $ShContorFely, $ZaminKol, $TarikhGhFeli, $TarikhGhQabli, $waterAmount, $EnsheabQotr, $shomareh_eghtesadi, $shenase_meli, $tel)
    {
        $db = db::getInstance();
        $WaterBillHash = generateHash(32);
        $create_date = jdate("Y-m-d");
        $db->insert("INSERT INTO s_water_bill (user_id, water_bill_hash, period_name, period_id, contract_number, create_date, water_qty, water_rate, water_amount,
       vat_total_water_bill, abonman_amount, khadamat_amount, debit_water_bill, sum_totality, meter_befor_number, meter_curent_number, usance_date , diameter_pipe, shenase_ghabz, shenase_pardakht,
       bill_serial_mahfa, company_name, area, shomareh_eghtesadi, shenase_meli, postal_code, tel, address,  az_tarikh, ta_tarikh , tarikh_gh_qabli , tarikh_gh_feli)
       
    VALUES(:userId, :WaterBillHash, :NameDoreh, :Shomare, :contractNumber,:create_date, :MizanMasraf, :Nerkh, :waterAmount, :MablaghMaliat,:Aboneman,
       :khadamatAbresani, :BedehiQ, :GhabelPardakht,
       :ShContorQabli, :ShContorFely,  :MohlatPardakht, :EnsheabQotr, :ShenaseGhabz, :ShenasePardakht, :CodeQabz, :companyName,:ZaminKol, :shomareh_eghtesadi, :shenase_meli, :CodePosti, :tel,
       :address, :AzTarikh, :TaTarikh, :TarikhGhQabli, :TarikhGhFeli)", array(

            'userId' => $userId,
            'WaterBillHash' => $WaterBillHash,
            'create_date' => $create_date,
            'contractNumber' => $contractNumber,
            'companyName' => $companyName,
            'address' => $address,
            'ShenaseGhabz' => $ShenaseGhabz,
            'ShenasePardakht' => $ShenasePardakht,
            'MizanMasraf' => $MizanMasraf,
            'Nerkh' => $Nerkh,
            'Aboneman' => $Aboneman,
            'khadamatAbresani' => $khadamatAbresani,
            'MablaghMaliat' => $MablaghMaliat,
            'GhabelPardakht' => $GhabelPardakht,
            'CodeQabz' => $CodeQabz,
            'Shomare' => $Shomare,
            'AzTarikh' => $AzTarikh,
            'TaTarikh' => $TaTarikh,
            'AbBaha' => $AbBaha,
            'MohlatPardakht' => $MohlatPardakht,
            'NameDoreh' => $NameDoreh,
            'BedehiQ' => $BedehiQ,
            'CodePosti' => $CodePosti,
            'ShContorQabli' => $ShContorQabli,
            'ShContorFely' => $ShContorFely,
            'ZaminKol' => $ZaminKol,
            'TarikhGhFeli' => $TarikhGhFeli,
            'TarikhGhQabli' => $TarikhGhQabli,
            'waterAmount' => $waterAmount,
            'EnsheabQotr' => $EnsheabQotr,
            'shomareh_eghtesadi' => $shomareh_eghtesadi,
            'shenase_meli' => $shenase_meli,
            'tel' => $tel,
        ));
    }

    public static function insert_bill_payed_bank($payedDate, $payedFor, $amount, $shenaseGhabz, $shenasePardakht, $rrn, $cardNumber)
    {
        $db = db::getInstance();
        $db->insert("INSERT INTO `s_bill_payed_bank`
            (`b_payed_date`, `b_payed_for`, `b_amount`, `b_shenase_ghabz`, `b_shenase_pardakht`, `b_rrn`, `b_card_number`)
            VALUES (:payedDate,:payedFor,:amount,:shenaseGhabz,:shenasePardakht,:rrn,:cardNumber)", array(
            'payedDate' => $payedDate,
            'payedFor' => $payedFor,
            'amount' => $amount,
            'shenaseGhabz' => $shenaseGhabz,
            'shenasePardakht' => $shenasePardakht,
            'rrn' => $rrn,
            'cardNumber' => $cardNumber,
        ));
    }

    public static function insert_wsd_period($periodNumber, $periodName, $startDate, $endDate)
    {
        $db = db::getInstance();
        $db->insert("INSERT INTO `s_water_period`( `period_id`, `period_name`, `start_date`, `end_date`)
            VALUES (:periodNumber, :periodName, :startDate, :endDate)", array(
            'periodNumber' => $periodNumber,
            'periodName' => $periodName,
            'startDate' => $startDate,
            'endDate' => $endDate,
        ));
    }

    public static function update_wsd_period ($id ,$periodNumber, $periodName, $startDate, $endDate )
    {
        $db = db::getInstance();
        $count= $db->first("SELECT COUNT(*) FROM `s_water_counter` WHERE `period_number`=:periodNumber" , array(
            'periodNumber' => $periodNumber,
        ));
        if ($count['COUNT(*)']==0) {
            $db->modify("UPDATE `s_water_period` 
        SET period_id=:periodNumber, period_name=:periodName, start_date=:startDate, end_date=:endDate
        WHERE `water_table_id`=$id", array(
                'periodNumber' => $periodNumber,
                'periodName' => $periodName,
                'startDate' => $startDate,
                'endDate' => $endDate,
            ));
        }else{
            $db->modify("UPDATE `s_water_period` 
        SET  start_date=:startDate, end_date=:endDate
        WHERE `water_table_id`=$id", array(
                'startDate' => $startDate,
                'endDate' => $endDate,
            ));
        }
    }

    public static function delete_wsd_period($id)
    {
        $db = db::getInstance();
        $count= $db->first("SELECT COUNT(*) FROM `s_water_counter` WHERE `period_number`=:periodNumber" , array(
            'periodNumber' => $periodNumber,
        ));
        $db->modify("DELETE FROM s_water_period WHERE water_table_id='$id'");
        return 'ok';
    }

    public static function update_bill_payed_bank($id, $payedDate, $payedFor, $amount, $shenaseGhabz, $shenasePardakht, $rrn, $cardNumber )
    {
        $db = db::getInstance();
        $db->modify("UPDATE `s_bill_payed_bank` 
        SET `b_payed_date`=:payedDate,`b_payed_for`=:payedFor,`b_amount`=:amount,`b_shenase_ghabz`=:shenaseGhabz,
        `b_shenase_pardakht`=:shenasePardakht,`b_rrn`=:rrn,`b_card_number`=:cardNumber
        WHERE `payed_bank_id`=$id", array(
            'payedDate' => $payedDate,
            'payedFor' => $payedFor,
            'amount' => $amount,
            'shenaseGhabz' => $shenaseGhabz,
            'shenasePardakht' => $shenasePardakht,
            'rrn' => $rrn,
            'cardNumber' => $cardNumber,
            ));
    }

    public static function fetch_bill_payed_bank($shenaseGhabz, $shenasePardakht)
    {
        $db = db::getInstance();
        $record = $db->first("SELECT * FROM `s_bill_payed_bank` WHERE 
            `b_shenase_ghabz`=:shenaseGhabz AND `b_shenase_pardakht`=:shenasePardakht", array(
            'shenaseGhabz' => $shenaseGhabz,
            'shenasePardakht' => $shenasePardakht,
        ));
        return $record;
    }



    public static function fetch_bill_payed_bank_by_id($id)
    {
        $db = db::getInstance();
        $record = $db->first("SELECT * FROM `s_bill_payed_bank` WHERE payed_bank_id=:payed_bank_id", array(
            'payed_bank_id' => $id,
        ));
        return $record;
    }
    public static function fetch_wsd_period_by_id($id)
    {
        $db = db::getInstance();
        $record = $db->first("SELECT * FROM `s_water_period` WHERE water_table_id=:water_table_id", array(
            'water_table_id' => $id,
        ));
        return $record;
    }

    public static function delete_shenase_payed_bank($id)
    {
        $db = db::getInstance();
        $db->modify("DELETE FROM s_bill_payed_bank WHERE payed_bank_id='$id'");
        return 'ok';
    }


    public static function read_from_csv($userId, $periodNumber, $periodName, $readDate, $counter)
    {
        $db = db::getInstance();
        $db->insert("INSERT INTO s_water_counter (`user_id`, `period_number`, `period_name`, `counter`, `read_date`) VALUES (:userId, :periodNumber, :periodName,:counter, :readDate)", array(
            'userId' => $userId,
            'periodNumber' => $periodNumber,
            'periodName' => $periodName,
            'counter' => $counter,
            'readDate' => $readDate,
        ));

    }

    public static function fetch_water_bill_by_period_id($periodId)
    {
        $db = db::getInstance();
        $record = $db->query("SELECT DISTINCT * FROM s_water_bill LEFT JOIN s_transaction ON s_water_bill.water_bill_hash=s_transaction.hash AND s_transaction.payed=1 
          LEFT JOIN s_bill_payed_bank ON s_water_bill.shenase_pardakht=s_bill_payed_bank.b_shenase_pardakht AND s_water_bill.shenase_ghabz=s_bill_payed_bank.b_shenase_ghabz
          WHERE s_water_bill.period_id=:periodId  ", array(
            'periodId' => $periodId,
        ));

        return $record;
    }

    public static function fetch_water_bill_by_contract_number($contractNumber)
    {
        $db = db::getInstance();
        $record = $db->query("SELECT DISTINCT * FROM s_water_bill LEFT JOIN s_transaction ON s_water_bill.water_bill_hash=s_transaction.hash AND s_transaction.payed=1 
          LEFT JOIN s_bill_payed_bank ON s_water_bill.shenase_pardakht=s_bill_payed_bank.b_shenase_pardakht AND s_water_bill.shenase_ghabz=s_bill_payed_bank.b_shenase_ghabz
          WHERE s_water_bill.contract_number=:contractNumber  ", array(
            'contractNumber' => $contractNumber,
        ));

        return $record;
    }

    public static function fetch_water_bill_by_rrn($rrn)
    {
        $db = db::getInstance();
        $record = $db->query("SELECT DISTINCT * FROM s_water_bill LEFT JOIN s_transaction ON s_water_bill.water_bill_hash=s_transaction.hash AND s_transaction.payed=1 
          LEFT JOIN s_bill_payed_bank ON s_water_bill.shenase_pardakht=s_bill_payed_bank.b_shenase_pardakht AND s_water_bill.shenase_ghabz=s_bill_payed_bank.b_shenase_ghabz
          WHERE s_transaction.rrn=:rrn  ", array(
            'rrn' => $rrn,
        ));

        return $record;
    }

    public static function fetch_water_bill_by_payment_time($paymentTime)
    {
        $db = db::getInstance();
        return $db->query("SELECT DISTINCT * FROM s_water_bill LEFT JOIN s_transaction ON s_water_bill.water_bill_hash=s_transaction.hash AND s_transaction.payed=1
           LEFT JOIN s_bill_payed_bank ON s_water_bill.shenase_pardakht=s_bill_payed_bank.b_shenase_pardakht AND s_water_bill.shenase_ghabz=s_bill_payed_bank.b_shenase_ghabz
           WHERE (s_transaction.paymentTime LIKE :paymentTime) ", array(
            'paymentTime' => '%' . $paymentTime . '%',
        ));
    }

    public static function fetch_users($contractNumber)
    {
        $db = db::getInstance();
        return $db->query("SELECT * FROM s_company WHERE `contract_number`=:contractNumber", array(
            'contractNumber' => $contractNumber
        ));
    }

    public static function update_user ($contractName, $contractNumber, $area, $companyType, $waterCounter)
    {
        $db = db::getInstance();
        $userId= self::fetch_user_by_contract_number($contractNumber);
        $userId= $userId['user_id'];
        $db->modify("UPDATE `s_company` SET `contract_name`=:contractName , `area`=:area , `company_type`=:companyType , `is_water_counter`=:waterCounter 
                        WHERE user_id=$userId", array(
            'contractName' => $contractName,
            'area' => $area,
            'companyType' => $companyType,
            'waterCounter' => $waterCounter,
        ));
    }

    public static function fetch_invoice_between($startIndex, $endIndex)
    {
        $db = db::getInstance();
        return $db->query("SELECT s_company.contract_number , s_invoice.* , s_customer_detailes.* , s_transaction.* FROM s_invoice LEFT JOIN s_customer_detailes ON s_invoice.invoice_id=s_customer_detailes.invoice_id LEFT JOIN s_company ON s_invoice.user_id=s_company.user_id LEFT JOIN s_transaction ON s_invoice.purchase_hash=s_transaction.hash AND s_transaction.payed=1 WHERE s_invoice.invoice_id BETWEEN :startIndex AND :endIndex ", array(
            'startIndex' => $startIndex,
            'endIndex' => $endIndex,
        ));
    }

    public static function fetch_invoice_between_date($startDate, $endDate)
    {
        $db = db::getInstance();
        return $db->query("SELECT s_company.contract_number , s_invoice.* , s_customer_detailes.* , s_transaction.* FROM s_invoice LEFT JOIN s_customer_detailes ON s_invoice.invoice_id=s_customer_detailes.invoice_id LEFT JOIN s_company ON s_invoice.user_id=s_company.user_id LEFT JOIN s_transaction ON s_invoice.purchase_hash=s_transaction.hash AND s_transaction.payed=1 WHERE s_invoice.issue_date BETWEEN :startDate AND :endDate ", array(
            'startDate' => $startDate,
            'endDate' => $endDate,
        ));
    }

    public static function sum_qty_between($startIndex = null, $endIndex = null, $contractNumber = null, $startDate = null, $endDate = null)
    {
        $db = db::getInstance();
        if (isset($startIndex) AND isset($endIndex)) {
            $record = $db->query("SELECT SUM(`qty`) FROM s_invoice WHERE `invoice_id` BETWEEN :startIndex AND :endIndex ", array(
                'startIndex' => $startIndex,
                'endIndex' => $endIndex,
            ));
        } elseif (isset($startDate) AND isset($endDate)) {
            $record = $db->query("SELECT SUM(`qty`) FROM s_invoice WHERE `issue_date` BETWEEN :startDate AND :endDate ", array(
                'startDate' => $startDate,
                'endDate' => $endDate,
            ));
        } elseif (isset($contractNumber)) {
            $userId = $db->first("SELECT `user_id` FROM `s_company` WHERE contract_number=:contractNumber", array(
                'contractNumber' => $contractNumber,
            ));
            $record = $db->query("SELECT SUM(`qty`) FROM s_invoice WHERE `user_id`=:userId", array(
                'userId' => $userId['user_id'],
            ));
        }
        return $record;
    }

    public static function sum_price_between($startIndex = null, $endIndex = null, $contractNumber = null, $startDate = null, $endDate = null)
    {
        $db = db::getInstance();

        if (isset($startIndex) AND isset($endIndex)) {
            $record = $db->query("SELECT SUM(`totality`) FROM s_invoice WHERE `invoice_id` BETWEEN :startIndex AND :endIndex ", array(
                'startIndex' => $startIndex,
                'endIndex' => $endIndex,
            ));
        } elseif (isset($startDate) AND isset($endDate)) {
            $record = $db->query("SELECT SUM(`totality`) FROM s_invoice WHERE `issue_date` BETWEEN :startDate AND :endDate ", array(
                'startDate' => $startDate,
                'endDate' => $endDate,
            ));
        } elseif (isset($contractNumber)) {
            $userId = $db->first("SELECT `user_id` FROM `s_company` WHERE contract_number=:contractNumber", array(
                'contractNumber' => $contractNumber,
            ));
            $record = $db->query("SELECT SUM(`totality`) FROM s_invoice WHERE `user_id`=:userId", array(
                'userId' => $userId['user_id'],
            ));
        }
        return $record;
    }

    public static function fetch_invoice_by_contract($contractNumber)
    {
        $db = db::getInstance();
        $userId = $db->first("SELECT `user_id` FROM `s_company` WHERE contract_number=:contractNumber", array(
            'contractNumber' => $contractNumber,
        ));
        $record = $db->query("SELECT s_company.contract_number , s_invoice.* , s_customer_detailes.* , s_transaction.* FROM s_invoice LEFT JOIN s_customer_detailes ON s_invoice.invoice_id=s_customer_detailes.invoice_id LEFT JOIN s_company ON s_invoice.user_id=s_company.user_id LEFT JOIN s_transaction ON s_invoice.purchase_hash=s_transaction.hash AND s_transaction.payed=1 WHERE s_invoice.user_id=:userId ", array(
            'userId' => $userId['user_id'],
        ));
        return $record;
    }

    public static function fetch_invoice_rrn($rrn)
    {
        $db = db::getInstance();
        $record = $db->query("SELECT s_company.contract_number , s_invoice.* , s_customer_detailes.* , s_transaction.* FROM s_invoice LEFT JOIN s_customer_detailes ON s_invoice.invoice_id=s_customer_detailes.invoice_id LEFT JOIN s_company ON s_invoice.user_id=s_company.user_id LEFT JOIN s_transaction ON s_invoice.purchase_hash=s_transaction.hash AND s_transaction.payed=1 WHERE s_transaction.reference=:rrn ", array(
            'rrn' => $rrn,
        ));
        return $record;
    }

    public static function fetch_permit_check_right()
    {
        $db = db::getInstance();
        $record = $db->query("SELECT `license_platte`,`channel`,`permit_rand`,`company_name`,`car_type`,`cargo`,`driver_name`,`issue_date`,`exite_date` FROM  s_exited WHERE channel LIKE '%راست%'  ORDER BY exited_id DESC LIMIT 5"
        );
        return $record;
    }

    public static function fetch_permit_check_left()
    {
        $db = db::getInstance();
        $record = $db->query("SELECT `license_platte`,`channel`,`permit_rand`,`company_name`,`car_type`,`cargo`,`driver_name`,`issue_date`,`exite_date` FROM s_exited WHERE channel LIKE '%چپ%'  ORDER BY exited_id DESC LIMIT 5"
        );
        return $record;
    }

    public static function fetch_permit_check()
    {
        $db = db::getInstance();
        $record = $db->query("SELECT `license_platte`,`channel`,`permit_rand`,`company_name`,`car_type`,`cargo`,`driver_name`,`issue_date`,`exite_date` FROM s_exited  ORDER BY exited_id DESC LIMIT 20"
        );
        return $record;
    }


    public static function fetch_permit_catalog_exited($startIndex, $countPage)
    {
        $db = db::getInstance();
        $record = $db->query("SELECT * FROM s_exited  ORDER BY exited_id DESC LIMIT :startIndex , :countPage  ", array(
            'startIndex' => $startIndex,
            'countPage' => $countPage,
        ));
        return $record;
    }

    public static function count_permit_exited()
    {
        $db = Db::getInstance();
        $records = $db->query("SELECT COUNT(*) AS total FROM s_exited ", array());
        return $records[0]['total'];
    }


    public static function fetch_catalog_permit($startIndex = null, $countPage = null)
    {
        $db = db::getInstance();
//        $record = $db->query("SELECT s_exit_permit.* , s_company.company_name , s_company.contract_number FROM s_exit_permit LEFT JOIN s_company ON s_exit_permit.user_id=s_company.user_id ORDER BY exit_permit_id DESC LIMIT $startIndex , $countPage  ");
        $record = $db->query("SELECT s_exit_permit.* , s_company.company_name , s_company.contract_number FROM ( SELECT * FROM s_exit_permit ORDER BY exit_permit_id DESC LIMIT $startIndex , $countPage ) s_exit_permit LEFT JOIN s_company ON s_exit_permit.user_id=s_company.user_id ORDER BY s_exit_permit.exit_permit_id DESC ");

        return $record;
    }


    public static function count_catalog_permit()
    {
        $db = Db::getInstance();
        $records = $db->query("SELECT COUNT(*) AS total FROM s_exit_permit ", array());
        return $records[0]['total'];
    }

    public static function fetch_by_license($license)
    {
        $db = Db::getInstance();
        $record = $db->first("SELECT s_check_permit.* , s_company.company_name FROM s_check_permit LEFT JOIN s_company ON s_check_permit.user_id=s_company.user_id where license_plate=:license AND exit_done=0", array(
            'license' => $license,
        ));
        return $record;
    }

    public static function fetch_by_exit_permit_hash($exitPermitHash)
    {
        $db = Db::getInstance();
        $record = $db->first("SELECT s_check_permit.* , s_company.company_name FROM s_check_permit LEFT JOIN s_company ON s_check_permit.user_id=s_company.user_id where exit_permit_hash=:exitPermitHash AND exit_done=0", array(
            'exitPermitHash' => $exitPermitHash,
        ));
        return $record;
    }

    public static function fetch_exited_license_catalog($license)
    {
        $db = Db::getInstance();
        $record = $db->query("SELECT * FROM `s_exited` WHERE `license_platte`=:license ORDER BY exite_date DESC ", array(
            'license' => $license,
        ));
        return $record;
    }

    public static function insert_manual_license($licensePlatte, $channel, $permitRand, $companyName, $carType, $cargo, $driver_name, $issueDate, $exitDate, $exitedHash)
    {
        $db = Db::getInstance();
        $db->insert("INSERT INTO s_exited (`license_platte`,`channel`,`permit_rand`,`company_name`,`car_type`,`cargo`,`driver_name`,`issue_date`,`exite_date`,`exited_hash`) 
                        VALUES (:licensePlatte, :channel, :permitRand, :companyName, :carType, :cargo, :driver_name, :issueDate, :exitDate, :exitedHash)", array(
            'licensePlatte' => $licensePlatte,
            'channel' => $channel,
            'permitRand' => $permitRand,
            'companyName' => $companyName,
            'carType' => $carType,
            'cargo' => $cargo,
            'driver_name' => $driver_name,
            'issueDate' => $issueDate,
            'exitDate' => $exitDate,
            'exitedHash' => $exitedHash,
        ));

    }

    public static function fetch_traffic_between($startDate, $endDate)
    {
        $db = db::getInstance();
        $record = $db->query("SELECT * FROM s_exited WHERE exite_date BETWEEN :startDate AND :endDate ", array(
            'startDate' => $startDate,
            'endDate' => $endDate,
        ));

        return $record;
    }

//    public static function fetch_catalog_permit($startIndex, $countPage)
//    {
//        $db = db::getInstance();
//        $record = $db->query("SELECT s_exit_permit.* , s_company.company_name , s_company.contract_number FROM s_exit_permit LEFT JOIN s_company ON s_exit_permit.user_id=s_company.user_id ORDER BY exit_permit_id DESC LIMIT $startIndex , $countPage  ");
//
//        return $record;
//    }

    public static function count_traffic($startDate, $endDate)
    {

        $db = Db::getInstance();
        $record = $db->query("SELECT COUNT(*) AS total FROM s_exited WHERE exite_date BETWEEN ' $startDate ' AND ' $endDate '");
        return $record[0]['total'];
    }

    public static function fetch_user_by_contract_number($contractNumber)
    {
        $db = db::getInstance();
        $record = $db->first("SELECT * FROM s_company WHERE contract_number=:contractNumber ", array(
            'contractNumber' => $contractNumber,
        ));
        return $record;
    }

    public static function reset_pass($userName, $hashPass, $changePassDate, $resetBy)
    {
        $db = Db::getInstance();
        $db->modify("UPDATE s_user SET password=:hashPass , change_pass_date=:date, pass_reseted=:resetBy WHERE username=:userName", array(
            'hashPass' => $hashPass,
            'userName' => $userName,
            'date' => $changePassDate,
            'resetBy' => $resetBy,
        ));
    }

    public static function fetch_count_exite_permit($date)
    {
        $db = db::getInstance();
        $date = '%' . $date . '%';
        $record = $db->first("SELECT COUNT(*) FROM s_exit_permit WHERE issue_date LIKE :date", array(
            'date' => $date,
        ));
        return $record;
    }

    public static function fetch_count_exite_permit_done($date)
    {
        $db = db::getInstance();
        $date = '%' . $date . '%';
        $record = $db->first("SELECT COUNT(*) FROM s_exit_permit WHERE `exit_done`=1 AND issue_date LIKE :date", array(
            'date' => $date,
        ));
        return $record;
    }

    //کنتور خوانی
    public static function fetch_water_period()
    {
        $db = db::getInstance();
        $record = $db->first("SELECT * FROM `s_water_period` ORDER BY `period_id` DESC LIMIT 1 ");
        return $record;
    }

    public static function fetch_last_water_counter($contractNumber, $periodId)
    {
        $db = db::getInstance();
        $record = $db->first("SELECT s_company.contract_number ,s_company.contract_name, s_company.company_name, s_company.address ,s_company.tele1, s_water_counter.* FROM s_company LEFT JOIN s_water_counter ON s_company.user_id=s_water_counter.user_id WHERE s_company.contract_number=:contractNumber AND s_water_counter.period_number=:periodId", array(
            'contractNumber' => $contractNumber,
            'periodId' => $periodId,
        ));
        return $record;
    }

    public static function fetch_new_water_counter($userId, $periodId)
    {
        $db = db::getInstance();
        $record = $db->first("SELECT s_company.contract_number ,s_company.contract_name, s_company.company_name, s_company.address ,s_company.tele1, s_water_counter.* FROM s_company LEFT JOIN s_water_counter ON s_company.user_id=s_water_counter.user_id WHERE s_company.user_id=:userId AND s_water_counter.period_number=:periodId", array(
            'userId' => $userId,
            'periodId' => $periodId,
        ));
        return $record;
    }

    public static function fetch_is_water_counter()
    {
        $db = db::getInstance();
        $record = $db->query("SELECT user_id FROM s_company WHERE is_water_counter=1");
        return $record;
    }

    public static function fetch_is_water_counter_reade($userId, $periodId)
    {
        $db = db::getInstance();
        $record = $db->first("SELECT counter FROM s_water_counter WHERE user_id=:userId AND period_number=:periodId", array(
            'userId' => $userId,
            'periodId' => $periodId,
        ));
        return $record;
    }

    public static function fetch_last_water_counter_by_userid($userId, $periodId)
    {
        $periodId = $periodId - 1;
        $db = db::getInstance();
        $record = $db->first("SELECT counter, period_name FROM s_water_counter WHERE user_id=:userId AND period_number=:periodId", array(
            'userId' => $userId,
            'periodId' => $periodId,
        ));
        return $record;
    }

    public static function insert_last_water_counter($userId, $periodId, $counter, $periodName)
    {
        $readerName = 'عدم قرائت(کارکرد صفر)';
        $db = db::getInstance();
        $readDate = jdate('Y-m-d H:i:s');
        $db->insert("INSERT INTO s_water_counter (`user_id`, `period_number`, `period_name`, `counter`, `read_date` ,`status` , `reader_name`   ) VALUES (:userId, :periodNumber, :periodName,:counter, :readDate , :status , :readerName)", array(
            'userId' => $userId,
            'periodNumber' => $periodId,
            'periodName' => $periodName,
            'counter' => $counter,
            'readDate' => $readDate,
            'status' => '0',
            'readerName' => $readerName,
        ));
    }

    public static function fetch_water_period_by_id($periodId)
    {
        $db = db::getInstance();
        $record = $db->query("SELECT s_company.contract_number, s_water_counter.counter, s_water_counter.read_date FROM s_company LEFT JOIN s_water_counter ON s_company.user_id=s_water_counter.user_id WHERE s_company.user_id=s_water_counter.user_id AND s_water_counter.period_number=:periodId", array(
            'periodId' => $periodId,
        ));
        return $record;
    }

    public static function fetch_all_water_period()
    {
        $db = db::getInstance();
        $record = $db->query("SELECT period_name,period_number, COUNT(period_number) FROM s_water_counter GROUP BY period_number HAVING COUNT(period_number) > 1 ");
        return $record;
    }

    public static function insert_water_counter($userId, $periodNumber, $periodName, $counter, $status, $readerName)
    {
        $db = db::getInstance();
        $readDate = jdate('Y-m-d H:i:s');
        $db->insert("INSERT INTO s_water_counter (`user_id`, `period_number`, `period_name`, `counter`, `read_date` ,`status` , `reader_name`   ) VALUES (:userId, :periodNumber, :periodName,:counter, :readDate , :status , :readerName)", array(
            'userId' => $userId,
            'periodNumber' => $periodNumber,
            'periodName' => $periodName,
            'counter' => $counter,
            'readDate' => $readDate,
            'status' => $status,
            'readerName' => $readerName,
        ));
    }

    public static function update_water_counter($userId, $periodNumber, $counter, $status, $readerName)
    {
        $db = db::getInstance();
        $readDate = jdate('Y-m-d H:i:s');
        $db->modify("UPDATE `s_water_counter` SET `counter`=:counter , `change_date`=:readDate , `read_date`=:readDate , `status`=:status , `reader_name`=:readerName WHERE user_id=:userId AND `period_number`=:periodNumber ", array(
            'userId' => $userId,
            'periodNumber' => $periodNumber,
            'counter' => $counter,
            'readDate' => $readDate,
            'status' => $status,
            'readerName' => $readerName,
        ));
    }

    public static function count_exit_permit_between($startDate, $endDate)
    {
        $db = db::getInstance();
        $record = $db->first("SELECT COUNT(*) FROM s_exit_permit WHERE  issue_date BETWEEN :startDate AND :endDate", array(
            'startDate' => $startDate,
            'endDate' => $endDate,
        ));
        return $record;
    }

    public static function count_exit_between($startDate, $endDate)
    {
        $db = db::getInstance();
        $record = $db->first("SELECT COUNT(*) FROM `s_exited` WHERE `exite_date`  BETWEEN :startDate AND :endDate", array(
            'startDate' => $startDate,
            'endDate' => $endDate,
        ));
        return $record;
    }

    public static function count_exit_by_permit_between($startDate, $endDate)
    {
        $db = db::getInstance();
        $record = $db->first("SELECT COUNT(*) FROM `s_exited` WHERE `permit_rand`>0 AND `exite_date`  BETWEEN :startDate AND :endDate", array(
            'startDate' => $startDate,
            'endDate' => $endDate,
        ));
        return $record;
    }

    public static function fetch_userId_by_contractNumber($contractNumber)
    {
        $db = db::getInstance();
        return $db->first("SELECT `user_id`,`area` FROM `s_company` WHERE `contract_number`=:contractNumber", array(
            'contractNumber' => $contractNumber,
        ));
    }

    public static function insert_starter_charge_debit ($userId, $contractNumber, $area, $debitYear, $debit)
    {
        $db = db::getInstance();
        $db->insert("  INSERT INTO `s_charge_debit` (`user_id`, `contract_number`, `area`, `debit_year`, `debit`)
  SELECT :userId, :contractNumber, :area, :debitYear, :debit FROM DUAL
WHERE NOT EXISTS
    (SELECT `contract_number` FROM `s_charge_debit` WHERE contract_number =:contractNumber )", array(
            'userId'         => $userId,
            'contractNumber' => $contractNumber,
            'area'           => $area,
            'debitYear'      => $debitYear,
            'debit'          => $debit,
        ));
//        $db->insert("INSERT INTO `s_charge_debit` (`user_id`, `contract_number`, `area`, `debit_year`, `debit`)
//                        SELECT * FROM (SELECT :userId, :contractNumber, :area, :debitYear, :debit) AS tmp
//                        WHERE NOT EXISTS (
//                        SELECT `contract_number`  FROM s_charge_debit WHERE contract_number =:contractNumber
//                        ) LIMIT 1", array(
//            'userId'         => $userId,
//            'contractNumber' => $contractNumber,
//            'area'           => $area,
//            'debitYear'      => $debitYear,
//            'debit'          => $debit,
//        ));

      ;



//        $db->insert("INSERT INTO `s_charge_debit`( `user_id`, `contract_number`, `area`, `debit_year`, `debit`)
//        VALUES (:userId, :contractNumber, :area, :debitYear, :debit)", array(
//            'userId'         => $userId,
//            'contractNumber' => $contractNumber,
//            'area'           => $area,
//            'debitYear'      => $debitYear,
//            'debit'          => $debit,
//        ));


    }

    public static function fetch_last_login()
    {
        $db = db::getInstance();
        $record = $db->query("SELECT s_login.* , s_company.company_name, s_company.address , s_company.manager_name FROM `s_login`
                 LEFT JOIN s_company ON s_login.user_id=s_company.user_id  ");

        return $record;
    }

    public static function importExcelSpreadsheet ($dir)
    {
        require_once ('includes/phpOffice/autoload.php');
        $reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
        $reader->setReadDataOnly(true);
        $spreadsheet = $reader->load($dir);
        $worksheet = $spreadsheet->getActiveSheet();
        $rows = $worksheet->toArray();
        $header = $rows[0];
        unset($rows[0]);
        $arr_data = $rows;
        $data['header'] = $header;
        $data['values'] = $arr_data;
        return $data;
    }

    public static function fetch_water_counter_by_period_number($periodId, $userId)
    {
        $db = db::getInstance();
        $record = $db->first("SELECT user_id FROM `s_water_counter` WHERE `period_number`=:periodId And `user_id`=:userId  ", array(
            'periodId' => $periodId,
            'userId' => $userId,
        ));
        return $record;
    }

    public static function fetch_userid($contractNumber)
    {
        $db = db::getInstance();
        $record = $db->first("SELECT user_id FROM s_company WHERE contract_number=:contractNumber", array(
            'contractNumber' => $contractNumber,
        ));
        return $record;
    }

    public static function insert_water_counter_excel($userId, $periodNumber, $periodName, $counter, $readerName, $readDate)
    {
        $db = db::getInstance();
        $db->insert("INSERT INTO s_water_counter (`user_id`, `period_number`, `period_name`, `counter`, `read_date`  , `reader_name`   ) VALUES (:userId, :periodNumber, :periodName,:counter, :readDate  , :readerName)", array(
            'userId' => $userId,
            'periodNumber' => $periodNumber,
            'periodName' => $periodName,
            'counter' => $counter,
            'readDate' => $readDate,
            'readerName' => $readerName,
        ));
    }


}
