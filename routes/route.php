<?php




$queryString = $_SERVER['QUERY_STRING'];
if ($queryString){
    list($controller , $action)  = explode('/', $queryString);
    $controllerClassName = '\Controller\\' . ucfirst($controller) . 'Controller';
}else{
    $controllerClassName = '\Controller\IndexController';
    $action = 'index';
}

$controllerInstance = new $controllerClassName();
$controllerInstance->$action();

