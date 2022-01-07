<?php
class SupportController{
    public function __construct()
    {
        if (!isset($_SESSION['user_id'])) {
            header('location:' . fullbaseUrl() . '/user/login');
            message(fail, 'لطفا ابتدا وارد سایت شوید', true);
            exit();
        }
    }
    
    public function tickets()
    {
        if (isset($_SESSION['roleId'])) {
            viewAdmin::render("/support/tickets.php");
        }else{
            view::render("/support/tickets.php");
        }
    }

    public function ticket()
    {
        $tickets = new Tickets;
        $data['ticketDetails'] = $tickets->ticketInfo($_GET['id']);
        $data['ticketReplies'] = $tickets->getTicketReplies($data['ticketDetails']['id']);
        $tickets->updateTicketReadStatus($data['ticketDetails']['id']);
        if (isset($_SESSION['roleId'])) {
            viewAdmin::render("/support/ticket.php", $data);
        }else {
            view::render("/support/ticket.php", $data);
        }
    }


    public function process()
    {
//        var_dump($_POST);
        $tickets = new Tickets;
        if(!empty($_POST['action']) && $_POST['action'] == 'listTicket') {
            $tickets->showTickets();
        }
        if(!empty($_POST['action']) && $_POST['action'] == 'createTicket') {
            $tickets->createTicket();
        }
        if(!empty($_POST['action']) && $_POST['action'] == 'createDebitTicket') {
            $tickets->createDebitTicket();
        }
        if(!empty($_POST['action']) && $_POST['action'] == 'getTicketDetails') {
            $tickets->getTicketDetails();
        }
        if(!empty($_POST['action']) && $_POST['action'] == 'updateTicket') {
            $tickets->updateTicket();
        }
        if(!empty($_POST['action']) && $_POST['action'] == 'closeTicket') {
            $tickets->closeTicket();
        }
        if(!empty($_POST['action']) && $_POST['action'] == 'saveTicketRepliesAdmin') {
            $tickets->saveTicketRepliesAdmin();
        }
        if(!empty($_POST['action']) && $_POST['action'] == 'saveTicketRepliesUser') {
            $tickets->saveTicketRepliesUser();
        }
    }

    public function notify()
    {
        if (!isset($_SESSION['user_id'])) {

            header('location:' . fullbaseUrl() . '/user/login');
            message(fail, 'لطفا ابتدا وارد سایت شوید', true);
            exit();
        }
            if (isset($_SESSION['roleId'])) {
                $data = SupportModel::notify_admin($_SESSION['roleId']);
            } else {
                $data = SupportModel::notify_user($_SESSION['user_id']);
//                $data['message'] = SupportModel::notify_message_user($_SESSION['user_id']);
            }


        if (isset($_SESSION['roleId'])) {
            if ($data!=null) {
                ViewAdmin::renderPartial('/support/notify.php' , $data);
            }
            ViewAdmin::renderPartial('/support/notify.php');
        }

            if ($data!=null) {
                View::renderPartial('/support/notify.php' , $data);
            }
            View::renderPartial('/support/notify.php');
    }

    public function about()
    {
            view::render("/support/about.php");
    }
    public function contact()
    {
            view::render("/support/contact.php");
    }
}



class Database {
    public function dbConnect() {
        static $DBH = null;
        global $config;
        $host= $config ['db']['host'];
        $user= $config ['db']['user'];
        $pass= $config ['db']['pass'];
        $name= $config ['db']['name'];
        if (is_null($DBH)) {
            $connection = new mysqli($host, $user, $pass, $name);
            if($connection->connect_error){
                die("Error failed to connect to MySQL: " . $connection->connect_error);
            } else {
                $DBH = $connection;
            }
        }
        return $DBH;
    }
}



class Tickets extends Database {
    private $ticketTable = 's_tickets';
    private $ticketRepliesTable = 's_ticket_replies';
    private $departmentsTable = 's_departments';
    private $dbConnect = false;
    public function __construct(){
        $this->dbConnect = $this->dbConnect();
        $this->dbConnect()->query("SET NAMES 'utf8'");
    }

    public function showTickets(){
//        dump($_POST);
        $sqlWhere = '';
        if(!isset($_SESSION["roleId"])) {
            $sqlWhere .= " WHERE t.user = '".$_SESSION["user_id"]."' ";
            if(!empty($_POST["search"]["value"])){
                $sqlWhere .= " and ";
            }
        } else if(isset($_SESSION["roleId"])) {
            $sqlWhere .= " WHERE t.department = '".$_SESSION["roleId"]."' ";
            if(!empty($_POST["search"]["value"])){
                $sqlWhere .= " and ";
            }
        }
        $time =  time();

            $sqlQuery = "SELECT  t.id, t.uniqid,
            t.title,
            t.init_msg as message, t.date, t.last_reply, t.resolved,
            CONCAT ( c.contract_number,' ، ', (IF(c.company_name IS NOT NULL ,c.company_name,'...'))) as creater,
            d.name as department , t.user, t.user_read, t.admin_read
			FROM s_tickets t 
			LEFT JOIN s_user u ON t.user = u.user_id
			LEFT JOIN s_departments d ON t.department = d.id 
            LEFT JOIN s_company c ON t.user = c.user_id
            LEFT JOIN s_user_role r ON t.user = r.user_id
              $sqlWhere ";
        if(!empty($_POST["search"]["value"])){
//            var_dump($_POST);
            $sqlQuery .= ' (uniqid LIKE "%'.$_POST["search"]["value"].'%" ';
            $sqlQuery .= ' OR init_msg LIKE "%'.$_POST["search"]["value"].'%" ';
            $sqlQuery .= ' OR title LIKE "%'.$_POST["search"]["value"].'%" ';
            $sqlQuery .= ' OR resolved LIKE "%'.$_POST["search"]["value"].'%" ';
            $sqlQuery .= 'OR c.company_name LIKE "%'.$_POST["search"]["value"].'%" ';
            $sqlQuery .= 'OR c.contract_number LIKE "%'.$_POST["search"]["value"].'%" ';
            $sqlQuery .= ' OR last_reply LIKE "%'.$_POST["search"]["value"].'%") ';
//            dump($sqlQuery);
        }
        if(!empty($_POST["order"])){
            $sqlQuery .= 'ORDER BY '.$_POST['order']['0']['column'].' '.$_POST['order']['0']['dir'].' ';
        } else {
            if(isset($_SESSION["roleId"])) {
                $sqlQuery .= 'ORDER BY t.admin_read ASC ';
            }else{
                $sqlQuery .= 'ORDER BY t.user_read ASC ';
            }
        }
//dump($sqlQuery);
        $result = mysqli_query($this->dbConnect, $sqlQuery);
        $numRows = mysqli_num_rows($result);

        if($_POST["length"] != -1){
            $sqlQuery .= 'LIMIT ' . $_POST['start'] . ', ' . $_POST['length'];
        }
        $result = mysqli_query($this->dbConnect, $sqlQuery);

        $ticketData = array();
        while( $ticket = mysqli_fetch_assoc($result) ) {
//            var_dump($ticket);
            $ticketRows = array();
            $status = '';
            if($ticket['resolved'] == 0)	{
                $status = '<span class="label label-success">Open</span>';
            } else if($ticket['resolved'] == 1) {
                $status = '<span class="label label-danger">Close</span>';
            }
//            $title = $ticket['title'];
            if ($ticket['admin_read']==1 && $ticket['user_read']==1 ) {
                $title= $ticket['title']." "."<img class='icon' src='".baseUrl()."/build/images/2check_muted.png'>";
            }else{
                $title= $ticket['title']." "."<img class='icon' src='".baseUrl()."/build/images/check.png'>";
            }
            if((isset($_SESSION["roleId"]) && !$ticket['admin_read'] && $ticket['last_reply'] != $_SESSION["user_id"]) || (!isset($_SESSION["roleId"]) && !$ticket['user_read'] && $ticket['last_reply'] != $ticket['user'])) {
                $title = $this->getRepliedTitle($ticket['title']);
            }
                $disbaled = '';

            if(!isset($_SESSION["roleId"])) {
                $disbaled = 'disabled';
            }
             if (isset($_SESSION['roleId'])) {
                 $read = $ticket['admin_read'];
            }else{
                 $read= $ticket['user_read'];
             }
            $ticketRows[] = '<a href="ticket?id='.$ticket["uniqid"].'" class="btn btn-primary  update fa fa-plus"> </a>';
            $ticketRows[] = $read;
            $ticketRows[] = $ticket['uniqid'];
            $ticketRows[] = $title;
            $ticketRows[] = $ticket['department'];
            $ticketRows[] = $ticket['creater'];
//            $ticketRows[] = ago($ticket['date']);
            $ticketRows[] = jdate('H:i:s Y-m-d ', $ticket['date'])."</br>".ago($ticket['date']);
            $ticketRows[] = $status;
            if (isset($_SESSION['roleId'])) {
//                $ticketRows[] = '<button type="button" name="update" id="'.$ticket["id"].'" class="btn btn-warning btn-xs update" '.$disbaled.'>ویرایش</button>';
                $ticketRows[] = '<button type="button" name="delete" id="'.$ticket["id"].'" class="btn btn-warning btn-xs delete"  '.$disbaled.'>بستن تیکت</button>';
            }
            $ticketData[] = $ticketRows;
        }
        $output = array(
            "draw"				=>	intval($_POST["draw"]),
            "recordsTotal"  	=>  $numRows,
            "recordsFiltered" 	=> 	$numRows,
            "data"    			=> 	$ticketData
        );
//        var_dump($output);
        echo json_encode($output);
    }

    public function getRepliedTitle($title) {
        $title = $title.'&nbsp;&nbsp;<span class="answered">جدید</span>';
        return $title;
    }
    public function createTicket() {
        if(!empty($_POST['subject']) && !empty($_POST['message'])) {
            $date = new DateTime();
            $date = $date->getTimestamp();
            $message = strip_tags($_POST['message']);
            // if admin create ticket
            if (isset($_SESSION['roleId'])) {
                if ($_POST['select-all']) {
                    $userId= $this->getUserid();
                    foreach ($userId as $contract_number) {
                        $uniqid = jdate("y").jdate("m").jdate("d").'-'.$this->generate_guid(7);
                        $queryInsert = "INSERT INTO " . $this->ticketTable . " (uniqid, user, title, init_msg, department, date, last_reply, user_read, admin_read, resolved)
                    VALUES('" . $uniqid . "', '" . $contract_number . "', '" . $_POST['subject'] . "', '" . $message . "', '" . $_POST['department'] . "', '" . $date . "', '" . $_SESSION["user_id"] . "', 0, 1, '" . $_POST['status'] . "')";
                        mysqli_query($this->dbConnect, $queryInsert);
                    }
                }else {
                    foreach ($_POST['contract_number'] as $contract_number) {
                        $uniqid = jdate("y").jdate("m").jdate("d").'-'.$this->generate_guid(7);
                        $queryInsert = "INSERT INTO " . $this->ticketTable . " (uniqid, user, title, init_msg, department, date, last_reply, user_read, admin_read, resolved) 
		        	VALUES('" . $uniqid . "', '" . $contract_number . "', '" . $_POST['subject'] . "', '" . $message . "', '" . $_POST['department'] . "', '" . $date . "', '" . $_SESSION["user_id"] . "', 0, 1, '" . $_POST['status'] . "')";
                        mysqli_query($this->dbConnect, $queryInsert);
                    }
                }
                // if user create ticket
            }else {
                $uniqid = jdate("y").jdate("m").jdate("d").'-'.$this->generate_guid(7);
                $queryInsert = "INSERT INTO " . $this->ticketTable . " (uniqid, user, title, init_msg, department, date, last_reply, user_read, admin_read, resolved) 
			VALUES('" . $uniqid . "', '" . $_SESSION["user_id"] . "', '" . $_POST['subject'] . "', '" . $message . "', '" . $_POST['department'] . "', '" . $date . "', '" . $_SESSION["user_id"] . "', 1, 0, '" . $_POST['status'] . "')";
                mysqli_query($this->dbConnect, $queryInsert);
            }

            echo 'success ' . $uniqid;
        } else {
            echo '<div class="alert error">لطفا تمامی موارد را تکمیل فرمایید</div>';
        }
    }
    public function createDebitTicket() {
//        var_dump($_POST);
//        exit();
        if(!empty($_POST['subject']) && !empty($_POST['message'])) {
//            var_dump($_POST);
            $date = new DateTime();
            $date = $date->getTimestamp();
            $message = strip_tags($_POST['message']);
            // if admin create ticket
            if (isset($_SESSION['roleId'])) {

                    foreach ($_POST['contract_number'] as $contract_number) {
                        $uniqid = jdate("y") . jdate("m") . jdate("d") . '-' . rand(0, 9999);
                        $queryInsert = "INSERT INTO " . $this->ticketTable . " (uniqid, user, title, init_msg, department, date, last_reply, user_read, admin_read, resolved, ticket_debit)
                    VALUES('" . $uniqid . "', '" . $contract_number . "', '" . $_POST['subject'] . "', '" . $message . "', '" . $_POST['department'] . "', '" . $date . "', '" . $_SESSION["user_id"] . "', 0, 1, '" . $_POST['status'] . "', 1)";
                        mysqli_query($this->dbConnect, $queryInsert);
                        echo 'success ' . $uniqid;

                }

            }

        } else {
            echo '<div class="alert error">لطفا تمامی موارد را تکمیل فرمایید</div>';
        }
    }
    public function getTicketDetails(){
        if($_POST['ticketId']) {
            $sqlQuery = "
				SELECT * FROM ".$this->ticketTable." 
				WHERE id = '".$_POST["ticketId"]."'";
            $result = mysqli_query($this->dbConnect, $sqlQuery);
            $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
            echo json_encode($row);
        }
    }
    public function updateTicket() {
        if($_POST['ticketId']) {
            $updateQuery = "UPDATE ".$this->ticketTable." 
			SET title = '".$_POST["subject"]."', department = '".$_POST["department"]."', init_msg = '".$_POST["message"]."', resolved = '".$_POST["status"]."'
			WHERE id ='".$_POST["ticketId"]."'";
            $isUpdated = mysqli_query($this->dbConnect, $updateQuery);
        }
    }
    public function closeTicket(){
        if($_POST["ticketId"]) {
            $sqlDelete = "UPDATE ".$this->ticketTable." 
				SET resolved = '1'
				WHERE id = '".$_POST["ticketId"]."'";
            mysqli_query($this->dbConnect, $sqlDelete);
        }
    }
    public function getDepartments() {
        $sqlQuery = "SELECT * FROM ".$this->departmentsTable;
        $result = mysqli_query($this->dbConnect, $sqlQuery);
        while($department = mysqli_fetch_assoc($result) ) {
            echo '<option value="' . $department['id'] . '">' . $department['name']  . '</option>';
        }
    }

    public function getCompany() {
        $sqlQuery = "SELECT * FROM s_company";
        $result = mysqli_query($this->dbConnect, $sqlQuery);
        while($company = mysqli_fetch_assoc($result) ) {
            echo '<option value="' . $company['user_id'] . '">' . $company['contract_number']  .' ' . $company['company_name']  . '</option>';
        }
    }
    public function getUserid() {
        $sqlQuery = "SELECT * FROM s_company";
        $result = mysqli_query($this->dbConnect, $sqlQuery);
        while($company = mysqli_fetch_assoc($result) ) {
           $data[]= $company['user_id'];
        }
        return $data;
    }
    public function ticketInfo($id) {
        $sqlQuery = "SELECT t.id, t.uniqid, t.title, t.user, t.init_msg as message, t.date, t.last_reply, t.resolved, t.user_read, t.admin_read ,
 CONCAT ( c.contract_number,' ، ', (IF(c.company_name IS NOT NULL ,c.company_name,'...'))) as creater, d.name as department 
			FROM s_tickets t 
			LEFT JOIN s_user u ON t.user = u.user_id
			LEFT JOIN s_departments d ON t.department = d.id 
            LEFT JOIN s_company c ON t.user = c.user_id 
			WHERE t.uniqid = '".$id."'";
        $result = mysqli_query($this->dbConnect, $sqlQuery);
        $tickets = mysqli_fetch_assoc($result);
        return $tickets;
    }
    public function saveTicketRepliesUser () {
        if($_POST['message']) {
            $date = new DateTime();
            $date = $date->getTimestamp();
            $queryInsert = "INSERT INTO ".$this->ticketRepliesTable." (user, text, ticket_id, date) 
				VALUES('".$_SESSION["user_id"]."', '".$_POST['message']."', '".$_POST['ticketId']."', '".$date."')";
            mysqli_query($this->dbConnect, $queryInsert);
            $updateTicket = "UPDATE ".$this->ticketTable." 
				SET last_reply = '".$_SESSION["user_id"]."', user_read = '1', admin_read = '0' 
				WHERE id = '".$_POST['ticketId']."'";
            mysqli_query($this->dbConnect, $updateTicket);
        }
    }
    public function saveTicketRepliesAdmin () {
        if($_POST['message']) {
            $date = new DateTime();
            $date = $date->getTimestamp();
            $queryInsert = "INSERT INTO ".$this->ticketRepliesTable." (user, text, ticket_id, date) 
				VALUES('".$_SESSION["user_id"]."', '".$_POST['message']."', '".$_POST['ticketId']."', '".$date."')";
            mysqli_query($this->dbConnect, $queryInsert);
            $updateTicket = "UPDATE ".$this->ticketTable." 
				SET last_reply = '".$_SESSION["user_id"]."', user_read = '0', admin_read = '1' 
				WHERE id = '".$_POST['ticketId']."'";
            mysqli_query($this->dbConnect, $updateTicket);
        }
    }
    public function getTicketReplies($id) {
        $sqlQuery = "SELECT r.id, r.text as message, r.date,
        CONCAT ( c.contract_number,'،', (IF(c.company_name IS NOT NULL ,c.company_name,'...'))) as creater
        , d.name as department, ro.role_id 
			FROM s_ticket_replies r
			LEFT JOIN s_tickets t ON r.ticket_id = t.id
			LEFT JOIN s_user u ON r.user = u.user_id 
			LEFT JOIN s_departments d ON t.department = d.id 
            LEFT JOIN s_company c ON t.user = c.user_id
            LEFT JOIN s_user_role ro ON r.user = ro.user_id
			WHERE r.ticket_id =  '".$id."'  ORDER BY `r`.`id` ASC ";
        $result = mysqli_query($this->dbConnect, $sqlQuery);
        $data= array();
        while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
            $data[]=$row;
        }
        return $data;
    }
    public function updateTicketReadStatus($ticketId) {
        $updateField = '';
        if(isset($_SESSION["roleId"])) {
            $updateField = "admin_read = '1'";
        } else {
            $updateField = "user_read = '1'";
        }
        $updateTicket = "UPDATE ".$this->ticketTable." 
			SET $updateField
			WHERE id = '".$ticketId."'";
        mysqli_query($this->dbConnect, $updateTicket);
    }
    function generate_guid($length){
        $characters = '1234567890';
        $tip = array();
        do{
            $charactersLength = strlen($characters);
            $randomId = '';
            for ($i = 0; $i < $length; $i++) {
                $randomId .= $characters[rand(0, $charactersLength - 1)];
            }
            //check uniquekey in database like you check unique username
            //something like that
            $sql = 'select * from s_tickets where `uniqid` = "'.$randomId.'"';//if your using PDO, bind accordingly
            $result = mysqli_query($this->dbConnect, $sql);
        }while(mysqli_num_rows($result)); //if no rows, loop will break and you would get uniqu id in $uniqueId variable
        return $randomId;
    }
}



