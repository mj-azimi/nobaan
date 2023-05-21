<?php

namespace Controller;

use Lib\Cache;
use Model\User;

//use Model\User;


class IndexController extends BaseController
{

    public function index()
    {

        return $this->render('first');
    }
}