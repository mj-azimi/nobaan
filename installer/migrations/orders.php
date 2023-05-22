<?php
use Illuminate\Database\Capsule\Manager as Capsule;


Capsule::schema()->create('orders', function ($table) {
    $table->increments('id');
    $table->string('phone');
    $table->integer('product_id');
    $table->string('discount');
    $table->timestamps();
});