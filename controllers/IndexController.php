<?php

namespace Controller;

use Lib\Cache;
use Model\Product;
use Model\User;

//use Model\User;


class IndexController extends BaseController
{

    public function index()
    {

        $product = Product::SelectAll();
        return $this->render('first' ,['product'=>$product]);
    }
}