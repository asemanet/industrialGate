<?php
class UserModel {
    public static function insert($username,$hashedPassword,$contract_name,$area ,$creationTime) {
//    $hashedPassword = encryptPassword($password);
        $db= Db::getInstance();
        $db->insert("INSERT INTO s_user (username,password, creation_time) VALUES (:username, :hashedPassword , :creationTime)" , array(
            'username' => $username,
            'hashedPassword' => $hashedPassword,
            'creationTime' => $creationTime,
        ));

        $record= $db->first("SELECT * FROM s_user WHERE username=:username", array(
            'username'=> $username,
        ));
        $id=$record['user_id'];
        $db->insert("INSERT INTO s_company (user_id,contract_name,contract_number,area) VALUES (:id, :contract_name, :username, :area)", array(
            'id'              => $id,
            'contract_name'   => $contract_name,
            'username'        => $username,
            'area'            => $area,

        ));
    }

    public static function login_summery_add($ip,$userId,$platform, $browserName, $browserVersion, $isMobile){
        $db= Db::getInstance();
        $loginTime= jdate('Y-m-d H:i:s');
        $db->insert("INSERT INTO s_login (user_id,ip_address,login_time,platform,browser_name,browse_version,is_mobile) VALUES
        (:userId, :ipAddress,:loginTime, :platform, :browserName, :browserVersion, :isMobile )" , array(
            'userId'           => $userId,
            'ipAddress'        => $ip,
            'loginTime'        => $loginTime,
            'platform'         => $platform,
            'browserName'      => $browserName,
            'browserVersion'   => $browserVersion,
            'isMobile'         => $isMobile,
        ));


    }

    public static function fetch_by_username($username) {
        $db= Db::getInstance();
        $recordUsername=$db->first("SELECT * FROM s_user WHERE username=:username" , array(
            'username' => $username,
        ));
        return $recordUsername;
    }

    public static function fetch_by_email_contract($email, $contract) {
        $db= Db::getInstance();
        $recordUsername=$db->first("SELECT * FROM s_company WHERE verify_email=1 AND email=:email AND contract_number=:contract" , array(
            'email' => $email,
            'contract' => $contract,
        ));
        return $recordUsername;
    }

    public static function fetch_token($token) {
        $db= Db::getInstance();
        $recordUsername=$db->first("SELECT * FROM s_pass_req WHERE token=:token AND active IS NULL AND used IS NULL " , array(
            'token' => $token,
        ));
        return $recordUsername;
    }

    public static function pass_req($userId, $token, $email)
    {
        $db = Db::getInstance();
        $issueDate = jdate('Y-m-d H:i:s');
        $db->modify("UPDATE s_pass_req SET active=0 WHERE user_id=$userId");
        $db->insert("INSERT INTO s_pass_req (user_id, token, issue_date, email) VALUES (:userId,:token,:issueDate,:email)", array(
            'userId' => $userId,
            'token' => $token,
            'issueDate' => $issueDate,
            'email' => $email,
        ));
        $db->modify("UPDATE s_user SET pass_req=1 WHERE user_id=$userId");
    }

    public static function fetch_by_company($session_user_id) {
        $db= Db::getInstance();
        return $db->first("SELECT * FROM s_company WHERE user_id=:session_user_id" , array(
            'session_user_id' => $session_user_id,
        ));
    }

    public static function fetch_login($userId) {
        $db= Db::getInstance();
        return $db->query("SELECT * FROM s_login WHERE user_id=:session_user_id  ORDER BY login_id DESC LIMIT 5" , array(
            'session_user_id' => $userId,
        ));
    }
    public static function update_Lastseen( $session_user_id ,$lastseen) {
        $db= Db::getInstance();
        $db->modify("UPDATE s_user SET lastseen=:lastseen WHERE user_id=:session_user_id", array(
            'lastseen'          => $lastseen,
            'session_user_id'   => $session_user_id,
        ));
    }

    public static function water_debit($userId) {
        $db= Db::getInstance();
        $dateNow= jdate('Y/m/d');
            $lastBil=$db->first("SELECT water_bill_id FROM s_water_bill  WHERE user_id=:userId   ORDER BY s_water_bill.water_bill_id DESC LIMIT 1  " , array(
                'userId' => $userId,
            ));
            $billId=$lastBil['water_bill_id'];
          $recordDebit= $db->query("SELECT sum_totality FROM s_water_bill LEFT OUTER JOIN s_transaction ON s_transaction.hash=s_water_bill.water_bill_hash
            LEFT JOIN s_bill_payed_bank ON s_water_bill.shenase_pardakht=s_bill_payed_bank.b_shenase_pardakht AND s_water_bill.shenase_ghabz=s_bill_payed_bank.b_shenase_ghabz 
           WHERE  s_water_bill.user_id=:userId AND s_water_bill.water_bill_id='{$billId}' AND s_transaction.payed IS NULL AND s_bill_payed_bank.b_payed_date IS NULL " , array(
            'userId' => $userId,
        ));
        return $recordDebit;
    }

    public static function access($userId){
        $db= Db::getInstance();
        $recordAccess= $db->query("SELECT * FROM  s_user_role   WHERE user_id=:userId"  , array(
            'userId' => $userId,
        ));
        return $recordAccess;
    }

    public static function haseRoles($roleName){
        $db= Db::getInstance();
        $record= $db->first("SELECT * FROM  s_user_role   WHERE user_id=:userId" , array(
            'userId' => $roleName,
        ));
    }

    public static function reset_pass( $userId ,$hashPass) {
        $db= Db::getInstance();
        $db->modify("UPDATE s_user SET password=:hashPass WHERE user_id=:userId", array(
            'hashPass'    => $hashPass,
            'userId'     => $userId,
        ));
    }

    public static function change_password ($userId, $password) {
        $db= Db::getInstance();
        $changeTime= jdate(" Y-m-d H:i:s ");
        $record = $db->modify("UPDATE s_user SET password=:password, change_pass_date=:changeTime, pass_req=0, pass_reseted='by-user' WHERE user_id=:userId" , array(
            'userId'     => $userId,
            'password'   => $password,
            'changeTime' => $changeTime,
        ));
        return $record;
    }
    public static function called_reset_page ($token) {
        $db= Db::getInstance();
        $callTime= jdate(" Y-m-d H:i:s ");
        $db->modify("UPDATE s_pass_req SET called='$callTime' WHERE token=:token" , array(
            'token'     => $token,
        ));
    }
    public static function pass_reset($userId, $pass, $email, $resetBy) {
        $db= Db::getInstance();
        $issueDate= jdate(" Y-m-d H:i:s ");
        $db->insert("INSERT INTO s_pass_reset (user_id,issue_date,pass,email,reset_by) VALUES (:userId, '$issueDate', :pass, :email, :resetBy)", array(
            'userId'   => $userId,
            'pass'     => $pass,
            'email'    => $email,
            'resetBy'  => $resetBy,
        ));
    }
    public static function used_reset_page ($token) {
        $db= Db::getInstance();
        $db->modify("UPDATE s_pass_req SET used=1 , active=0  WHERE token=:token" , array(
            'token'     => $token,
        ));
    }
}