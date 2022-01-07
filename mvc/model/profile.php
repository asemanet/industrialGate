<?php
class ProfileModel
{
  public static function modify($company_name , $national_number , $economic_code , $email , $website , $address , $piece_number , $postal_code ,  $tele1 , $tele2
    , $fax , $manager_name , $manager_lastname , $manager_codemeli ,$manager_shenasname , $manager_mobile , $manager_home , $activity , $noe_shakhs , $id)
  {
    $db= Db::getInstance();
    $db->modify("UPDATE s_company SET company_name=:company_name, national_number=:national_number, economic_code=:economic_code
 , email=:email, website=:website, address=:address, piece_number=:piece_number, postal_code=:postal_code
 , tele1=:tele1, tele2=:tele2, fax=:fax,manager_name=:manager_name, manager_lastname=:manager_lastname
 ,manager_codemeli=:manager_codemeli, manager_shenasname=:manager_shenasname, manager_mobile=:manager_mobile, manager_home=:manager_home
 , activity=:activity, noe_shakhs=:noe_shakhs
 WHERE user_id=:id ", array(
     'company_name'               =>$company_name ,
     'national_number'            =>$national_number ,
     'economic_code'              =>$economic_code ,
     'email'                      =>$email ,
     'website'                    =>$website ,
     'address'                    =>$address ,
     'piece_number'               =>$piece_number ,
     'postal_code'                =>$postal_code ,
     'tele1'                      =>$tele1 ,
     'tele2'                      =>$tele2 ,
     'fax'                        =>$fax ,
     'manager_name'               =>$manager_name ,
     'manager_lastname'           =>$manager_lastname ,
     'manager_codemeli'           =>$manager_codemeli ,
     'manager_shenasname'         =>$manager_shenasname ,
     'manager_mobile'             =>$manager_mobile ,
     'manager_home'               =>$manager_home ,
     'activity'                   =>$activity ,
     'noe_shakhs'                 =>$noe_shakhs ,
     'id'                         =>$id ,
    ));

  }

  public static function mail_verify($email, $userId) {
      $db= Db::getInstance();
      $db->modify("UPDATE s_company SET  email=:email, verify_email='1'  WHERE user_id=:userId " ,array(
          'email'                      =>$email ,
          'userId'                     =>$userId ,
      ));
  }

  public static function current_password_fetch ($userId) {
      $db= Db::getInstance();
      $record= $db->first("SELECT `password` FROM `s_user` WHERE user_id=:userId ", array(
          'userId' => $userId,
      ));
      return $record;
  }

    public static function change_password ($userId, $password) {
        $db= Db::getInstance();
        $changeTime= jdate(" Y-m-d H:i:s ");
        $record = $db->modify("UPDATE s_user SET password=:password, change_pass_date=:changeTime WHERE user_id=:userId" , array(
            'userId'     => $userId,
            'password'   => $password,
            'changeTime' => $changeTime,
        ));
        return $record;
    }

    public static function fetch_count_exit_permit($date, $userId) {
        $db = db::getInstance();
        $date='%'.$date.'%';
        $record = $db->first("SELECT COUNT(*) FROM s_exit_permit WHERE user_id=:userId AND issue_date LIKE :date " , array(
            'date' => $date,
            'userId' => $userId,
        ));
        return $record;
    }


}