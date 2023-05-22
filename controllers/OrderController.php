<?php

namespace Controller;

use Model\Config;
use Model\Order;

//use Model\User;


class OrderController extends BaseController
{

    public function add()
    {




        $order = Order::where('phone',$_POST['phone'])->where('product_id' , $_POST['productId'])->count();
        if ($order != 0) {
            $discount = 0;
        }else{
            $discount = Config::where('name','discount')->first()->value;
        }

        Order::create([
            'phone' => $_POST['phone'],
            'product_id' => $_POST['productId'],
            'discount'=>$discount
        ]);

        if ($discount == 0) {
            echo ('با موفقیت ذخیره شد / به دلیل  استفاده شدن مد تخفیف در قبل تخفیف اعمال نشد');
        }else{
            echo 'با موفقیت ذخیره شد';

        }
        
    }
}