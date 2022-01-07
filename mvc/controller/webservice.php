<?
class webserviceController {
    public function fetch_permit() {
        if (isset($_POST['password'])) {
            $pass = $_POST['password'];
            $license = $_POST['license'];
            $license = str_replace("آ", "الف", $license);
            $channel = "دوربین"." ".$_POST['channel'];


        if ($pass == 'rahpad 2468') {
            $exitDate = jdate('Y-m-d H:i:s');
            $db = db::getInstance();
            $result = $db->first("SELECT `permit_rand`,`issue_date`,`license_plate`,`cargo`,`driver_name`,`car_type`, `exit_permit_hash` , `user_id`
                           FROM s_check_permit where license_plate=:license ", array(
                                'license' => $license,
                            ));

            if (!empty($result)) {
                $exitPermitHash = $result['exit_permit_hash'];
                $permitRand = $result['permit_rand'];
                $issueDate = $result['issue_date'];
                $cargo = $result['cargo'];
                $driverName = $result['driver_name'];
                $carType = $result['car_type'];
                $userId = $result['user_id'];
                $fetchCompany = $db->first("SELECT `company_name` FROM `s_company` WHERE user_id=:userId ", array(
                    'userId' => $userId,
                ));
                $companyName = $fetchCompany['company_name'];

                $db->modify("UPDATE s_exit_permit SET due_date=:exitDate , exit_done=1 WHERE exit_permit_hash=:exitPermitHash", array(
                    'exitDate' => $exitDate,
                    'exitPermitHash' => $exitPermitHash,
                ));

                $db->query("DELETE FROM s_check_permit WHERE exit_permit_hash=:exitPermitHash", array(
                    'exitPermitHash' => $exitPermitHash,
                ));

                $db->modify("OPTIMIZE TABLE s_check_permit"
                );
            } else {
                $permitRand =0;
                $companyName = null;
                $carType = null;
                $cargo = null;
                $driverName = null;
                $issueDate = null;
                $exitPermitHash = null;
            }

//            if (!empty($result)) {
//
//            }
            $db->insert("INSERT INTO s_exited (`license_platte`,`channel`, `permit_rand`, `company_name`,`car_type`, `cargo`, `driver_name`, `issue_date`, `exite_date` , exited_hash )
 VALUES (:license , :channel , :permitRand, :companyName, :carType, :cargo, :driverName, :issueDate, :exitDate , :exitPermitHash  )", array(
                'license' => $license,
                'channel' => $channel,
                'permitRand' => $permitRand,
                'companyName' => $companyName,
                'carType' => $carType,
                'cargo' => $cargo,
                'driverName' => $driverName,
                'issueDate' => $issueDate,
                'exitDate' => $exitDate,
                'exitPermitHash' => $exitPermitHash,
            ));
            $json = json_encode($result);
            echo $json;
//            dump($result);
            return $json;
            //xml
            //creating object of SimpleXMLElement
            /*           $xml_user_info = new SimpleXMLElement("<?xml version=\"1.0\"?><user_info></user_info>");*/

//function call to convert array to xml
//           $xml= array_to_xml($result,$xml_user_info);

//saving generated xml file
//           $xml_file = $xml_user_info->asXML('users.xml');
//           echo $xml;
        }
            } else {
                echo "forbiden";
                exit();
            }
    }

    public function server() {
        echo "1";
        viewWebService::render("/asr/web-service/server.php");
    }


}