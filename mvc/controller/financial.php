<?php
class FinancialController {

    public function invoice($pageIndex) {
        if (!isset($_SESSION['user_id'])){
            header('location:' . fullbaseUrl() . '/user/login');
            exit;
        }
        $userId = $_SESSION['user_id'];
        $countPage = 50;
        $startIndex = ($pageIndex-1) * $countPage;
        $data['records'] = FinancialModel::catalogByPage($userId, $startIndex, $countPage);
        $recordsCount = FinancialModel::countPermit($userId);
        $data['pageCount'] = ceil($recordsCount / 50);
        $data['pageIndex'] = $pageIndex;
        $data['companyDetails']= UserModel::fetch_by_company($_SESSION['user_id']);
        sessionUp(15);
        view::render("/financial/invoice.php", $data);
    }
}