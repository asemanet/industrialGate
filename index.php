<?php
//ini_set('display_errors', 1);
//ini_set('display_startup_errors', 1);
//phpinfo();
//error_reporting(E_ALL);
//error_reporting(E_ALL ^ E_DEPRECATED);

define('test',true);
require_once ('system/loader.php');
$uri= getRequestUri();
//echo $uri;
$uri= str_replace(baseUrl().'/','/', $uri);
//echo $uri;

$queryString=$_SERVER['QUERY_STRING'];
if (strlen($queryString)>0){
    $qvars = explode('&' , $queryString);
  foreach ( $qvars as $qvar ){
    list($key , $value)= explode('=' , $qvar);
    $_GET[$key]=$value;
  }
  $uri = str_replace('?' . $queryString , '' , $uri);
}

global $config;
$route = $config['route'];
$uri = urldecode($uri);
foreach ($route as $alias=>$target){
  $alias = '^' . $alias;
  $alias = str_replace('/', '\/', $alias);

  $alias = str_replace('*', '(.*)', $alias);
  if (preg_match('/'.$alias.'/', $uri)) {
    $uri = preg_replace('/'.$alias.'/', $target, $uri);
  }
}
//echo $parts;
$parts= explode('/', $uri);
$controller= $parts[1];
$method= $parts[2];
//echo $method;
$params= array();
for ($i=3;  $i<count($parts); $i++){
  $params[] = $parts[$i];
}
$controllerClassname= ucfirst($controller)."Controller";
$controllerFilePath= "/mvc/controller/" . $controller . ".php";
$controllerInstance= new $controllerClassname();
call_user_func_array(array($controllerInstance, $method ),$params);

$browser1= new Browser();
if ($browser1->isRobot()=='true'){
    exit();
}


