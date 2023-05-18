<?php

use Config\ConnectDb;
use Symfony\Component\Yaml\Yaml;
use Symfony\Component\ErrorHandler\Debug;

$configPath = __DIR__.'/../config.yaml';
$appConfig = Yaml::parseFile($configPath)['app'];

if ($appConfig['debug']) {
    Debug::enable();
}else{
    ini_set('display_errors', 'off');
}

ConnectDb::getInstance();


require __DIR__.'/../installer/install.php';