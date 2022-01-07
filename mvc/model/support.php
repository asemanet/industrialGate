<?php
class SupportModel {

public static function notify_user($userId)
{
    $db= Db::getInstance();
    return $db->query_num_rows("SELECT * FROM `s_tickets` WHERE (`user`=:userId AND `user_read`=0) OR (`user`=:userId AND `ticket_debit`=1 AND `resolved`=0 )  " , array(
        'userId' => $userId,
    ));
}

//public static function notify_message_user($userId)
//{
//    $db= Db::getInstance();
//    return $db->query_num_rows("SELECT * FROM `s_tickets` WHERE (`user`=:userId AND `user_read`=0)   " , array(
//        'userId' => $userId,
//    ));
//}

public static function notify_admin($department)
{
    $db= Db::getInstance();
    return $db->query_num_rows("SELECT t.* , CONCAT(c.company_name,' -', c.contract_number) as creater
			FROM s_tickets t 
            LEFT JOIN s_company c ON t.user = c.user_id WHERE `admin_read`=0 AND `department`=:department" , array(
        'department' => $department,
    ));
}

}
