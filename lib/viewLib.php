<?php


function view($view,$array = null,$status = 200){

    require_once(__DIR__.'/../views/'.$view.'.php');
    http_response_code($status);
    die();
}