<?php
use Illuminate\Database\Capsule\Manager as Capsule;


Capsule::schema()->create('configs', function ($table) {
    $table->increments('id');
    $table->string('name');
    $table->string('value');
    $table->timestamps();
});


    $products[] =[
        "name"=>'discount',
        "value" =>'10'
    ];
Capsule::table('configs')->insert($products) ;