<?php
class billController {
    private function success($message, $code = '') {
        message('success', $message . $code, true);
    }

    private function fail($message, $code = '') {
        message('fail', $message . $code, true);
    }

    public function water($pageIndex) {
        if (!isset($_SESSION['user_id'])) {
            header('location:' . fullbaseUrl() . '/user/login');
            message(fail, 'لطفا ابتدا وارد سایت شوید', true);
            exit();
        }
        if ($pageIndex<=0){
            $pageIndex==1;
            return $pageIndex;
        }
        $userId = $_SESSION['user_id'];
        $countPage = 10;
        $startIndex = ($pageIndex-1) * $countPage;
        $data['records'] = BillModel::catalogByPage($userId, $startIndex, $countPage);
        $recordsCount = BillModel::count($userId);
        $data['pageCount'] = ceil($recordsCount / 10);
        $data['pageIndex'] = $pageIndex;
        $data['companyDetails']= UserModel::fetch_by_company($_SESSION['user_id']);
//        foreach ($data['records'] AS $records){
////            $data['pay_by_shenase_ghabz']= BillModel::fetch_pay_by_shenase($records['shenase_ghabz'], $records['shenase_pardakht']);
//            $payByShenaseGhabz[]= BillModel::fetch_pay_by_shenase($records['shenase_ghabz'], $records['shenase_pardakht']);
//        }
//        var_dump($payByShenaseGhabz);
//        var_dump($data);
        sessionUp(15);
        view::render("/bill/water.php", $data);
    }
    public function payWater() {
        header('Content-type: text/html; charset=utf-8');
        $purchase_hash= $_POST['hash'];
        $waterData= BillModel::fetch_water_by_hash($purchase_hash);
        $userId = $_SESSION['user_id'];
//        dump($waterData);
        $totality= $waterData['sum_totality'];
        $vat= $waterData['vat_total_water_bill'];
        $payedFor = 1;  // عدد یک نشان دهنده پرداخت بابت فبض آب
        $rate= $waterData['water_rate'];
        $qty= $waterData['water_qty'];
        $amount= $waterData['water_amount'];
        $payed = 0;
        $issueDate = jdate(" Y-m-d H:i:s ");
        $seial=$waterData['bill_serial_mahfa'];
        $debit= $waterData['debit_water_bill'];
        $title= "  قبض آب شرکت " . $_SESSION['company_name'] .$_SESSION['contract_number']."-". "  به شماره سریال:  " . $seial;
        PaymentModel::create_purchase($userId, $purchase_hash, $payedFor, $totality, $title, $qty, $rate, $amount, $debit, $vat, $issueDate, $payed );
//        die();
        $pay = new PaymentController();
        $pay->pay($purchase_hash);
        sessionUp(15);
    }
}