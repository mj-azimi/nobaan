<?php




$queryString = $_SERVER['QUERY_STRING'];
list($controller , $action)  = explode('/', $queryString);

$controllerClassName = '\Controller\\' . ucfirst($controller) . 'Controller';
$controllerInstance = new $controllerClassName();
$controllerInstance->$action();

