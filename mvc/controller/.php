<?
if (!isset($_SESSION['user_id'])) {
    header('location: ../user/login');
    message(fail , 'لطفا ابتدا وارد سایت شوید' , true);
    exit();
}elseif (isset($_SESSION['roleId'])){
    header('location: ../asr/admin');
}elseif(isset($_SESSION['company_name'])){
    header('location: ../profile/company');
}elseif(!isset($_SESSION['company_name'])){
    header('location: ../profile/contact');
}