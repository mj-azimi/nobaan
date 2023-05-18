<?php

namespace Controller;


use Illuminate\Database\Capsule\Manager as Capsule;
use Model\User;


class FirstController extends  BaseController
{
    public function index()
    {


        $this->render('first');
    }
}