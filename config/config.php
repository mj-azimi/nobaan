<?php

use Symfony\Component\ErrorHandler\Debug;


//load env
$dotenv = \Dotenv\Dotenv::createImmutable(__DIR__ . '/..');
$dotenv->load();


//Debug mode
if ( $_ENV['APP_DEBUG'] == 'true'){
    Debug::enable();
}else{
    view('errors/500');
}
require_once(__DIR__.'/../database/config.php');