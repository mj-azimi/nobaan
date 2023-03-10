<?php
list(,$action,$method) = explode('/',$_SERVER['REQUEST_URI']);
$controllerName = '\App\Controllers\\'.ucwords($action).'Controller';
$controller = new $controllerName();
$controller->$method();