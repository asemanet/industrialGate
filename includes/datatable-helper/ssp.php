<?php
class sspAsr{

    public function datatableServerSide()
    {
        if (!isset($_SESSION['roleId'])) {
            header("location: ../user/login");
            session_destroy();
            exit();
        }

        if ($_SESSION['roleId'] != 1820 AND $_SESSION['roleId'] > 1819) {
            messageAdmin("fail", '<span>شما دسترسی به این قسمت ندارید</span><br><br><a class="btn btn-default" href="../asr/admin">بازگشت</a>', true);
        }

        if (!isset($_SESSION['user_id'])) {
            header('location:' . fullbaseUrl() . '/user/login');
            exit;
        }
        // DB table to use
        $table = 's_water_period';
        $primaryKey = 'water_table_id';

        global $config;
        $sql_details = array(
            'user' => $config ['db']['user'],
            'pass' => $config ['db']['pass'],
            'db' => $config ['db']['name'],
            'host' => $config ['db']['host'],
        );
        $joinQuery = "FROM   `{$table}`  ";
        $columns = array(
            array('db' => '`s_water_period`.`water_table_id`', 'dt' => '0', 'field' => 'water_table_id'),
            array('db' => '`s_water_period`.`period_id`', 'dt' => '1', 'field' => 'period_id'),
            array('db' => '`s_water_period`.`period_name`', 'dt' => '2', 'field' => 'period_name'),
            array('db' => '`s_water_period`.`start_date`', 'dt' => '3', 'field' => 'start_date'),
            array('db' => '`s_water_period`.`end_date`', 'dt' => '4', 'field' => 'end_date'),
        );

        $joinQuery = "FROM  `{$table}`  ";

        $extraWhere = 'ORDER BY `s_water_period`.`water_table_id` DESC';
        echo json_encode(
//            SSPCustom::simple( $_POST, $sql_details, $table, $primaryKey, $columns, $joinQuery)
            SSPCustom::simple($_POST, $sql_details, $table, $primaryKey, $columns, $joinQuery, '', '', '', $extraWhere)
        );


    }

}