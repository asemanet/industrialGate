<?php
//echo '{
//"data": [ ["0","\u0627\u06cc\u0631\u0627\u064683 145\u064582","","\u062f\u0648\u0631\u0628\u06cc\u0646 \u062e\u0631\u0648\u062c\u06cc \u0631\u0627\u0633\u062a","0","","","","","1398\/04\/31 23:38:53"]]}
//';
//exit();

 foreach ($data as $record){
    $issueDate= $record["issue_date"];
    $issueDate= str_replace('-' , '/' , "$issueDate" );
    $dueDate= $record["exite_date"];
    $dueDate= str_replace('-' , '/' , "$dueDate" );

//    $out = array(
//        'permit_rand'     => $data[0]['permit_rand'],
//        'license_platte'  => $data[0]['license_platte'],
//        'company_name'    => $data[0]['company_name'],
//        'channel'         => $data[0]['channel'],
//        'permit_rand'     => $data[0]['permit_rand'] ,
//        'car_type'        => $data[0]['car_type'] ,
//        'driver_name'     => $data[0]['driver_name'],
//        'cargo'           => $data[0]['cargo'],
//        'issue_date'      => $issueDate,
//        'exite_date'      => $dueDate ,
//    );
    $out = array(

       $record['license_platte'],
       $record['company_name'],
       $record['channel'],
       $record['permit_rand'] ,
       $record['car_type'] ,
       $record['driver_name'],
       $record['cargo'],
       $issueDate,
       $dueDate ,

    );
           $json=json_encode($out);
//     echo json_encode( array('data' => $out) );

//return $json;
};
//dump($out);
$licensePlatte = array_column($data,'license_platte');
$channel       = array_column($data,'channel');
$permit_rand   = array_column($data,'permit_rand');
$company_name  = array_column($data,'company_name');
$car_type      = array_column($data,'car_type');
$cargo         = array_column($data,'cargo');
$driver_name   = array_column($data,'driver_name');
$issue_date    = array_column($data,'issue_date');
$exite_date    = array_column($data,'exite_date');
//print_r($licensePlatte);

for ($i = 0; $i < 5; $i++) {
    $t=$i;
    $issueDate= $data[$t]["issue_date"];
    $issueDate= str_replace('-' , '/' , "$issueDate" );
    $dueDate= $data[$t]["exite_date"];
    $dueDate= str_replace('-' , '/' , "$dueDate" );
    $test[$t] = array(
        $data[$t]['license_platte'],
        $data[$t]['company_name'],
        $data[$t]['channel'],
        $data[$t]['permit_rand'] ,
        $data[$t]['car_type'] ,
        $data[$t]['driver_name'],
        $data[$t]['cargo'],
        $issueDate,
        $dueDate ,
    );
    $t++;
}
echo json_encode( array('data' => $test) );
//dump($test);
$dataTable= array(

    $licensePlatte,
    $channel      ,
    $permit_rand  ,
    $company_name ,
    $car_type     ,
    $cargo        ,
    $driver_name  ,
    $issue_date   ,
    $exite_date   ,

);
//dump($dataTable);
//echo json_encode( array('data' => $dataTable) );

//unset($data[0]['exited_id'] );
//dump($data);
//echo json_encode( array('data' => $data) );
//exit();
//$data=json_encode($data);
//dump($out);
//$out= json_encode($out);
//echo "{ \"data\": [" . json_encode($data) . "]}";
//echo "{ \"data\": [" . $json . "]}";
//echo "{ \"data\": [" . $out . "]}";

//echo "{ \"data\": [" . json_encode($data) . "]}";

//echo "{ \"data\": [[\"\u0627\u06cc\u0631\u0627\u064683 145\u064582\",\"\",\"\u062f\u0648\u0631\u0628\u06cc\u0646 \u062e\u0631\u0648\u062c\u06cc \u0631\u0627\u0633\u062a\",\"0\",\"\",\"\",\"\",\"\",\"1398-04-31 23:38:53\"]]}";
//echo "{ \"data\": [[{\"license_platte\":\"\u0627\u06cc\u0631\u0627\u064683 145\u064582\",\"channel\":\"\u062f\u0648\u0631\u0628\u06cc\u0646 \u062e\u0631\u0648\u062c\u06cc \u0631\u0627\u0633\u062a\",\"permit_rand\":\"0\",\"company_name\":\"\",\"car_type\":\"\",\"cargo\":\"\",\"driver_name\":\"\",\"issue_date\":\"\",\"exite_date\":\"1398-04-31 23:38:53\"}]]}";
?>

