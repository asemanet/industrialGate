<?php
//Create a new soap server
load_nusoap();
$server = new soap_server();
$nameSpace=  "http:// http://sample.shamsabad.org/webservice/server";
$endpoint = "http://sample.shamsabad.org/webservice/server";
$server->configureWSDL("myService1", $nameSpace, $endpoint);
$server->wsdl->schemaTargetNamespace = $nameSpace;
function getmessage($message){
    return "Welcome".$message;
}
$server->register('getmessage',
    array('name' => 'xsd:string'),  //parameter
    array('data' => 'xsd:string') , //output
    "http://sample.shamsabad.org/webservice/server",   //namespace
    "http://sample.shamsabad.org/webservice/server/getmessage" //soapaction
);
$HTTP_RAW_POST_DATA= isset($HTTP_RAW_POST_DATA) ? $HTTP_RAW_POST_DATA: '';
$server->service('$HTTP_RAW_POST_DATA');




//    $server->configureWSDL("fetch_permit", "urn:fetch_permit");
//    $server->register('show_Permit',
//        array('userId' => 'xsd:string'),  //parameter
//        array('data' => 'xsd:string'),  //output
//        'urn:showPermit',   //namespace
//        'urn:fetch_permit#fetch_permit' //soapaction
//    );
//    $server->service(file_get_contents("php://input"));

