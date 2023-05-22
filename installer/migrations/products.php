<?php
use Illuminate\Database\Capsule\Manager as Capsule;


Capsule::schema()->create('products', function ($table) {
    $table->increments('id');
    $table->string('name');
    $table->string('img');
    $table->decimal('price');
    $table->integer('quantity');
    $table->boolean('discounted');
    $table->timestamps();
});


$products = [];

for ($i = 0; $i < 10; $i++) {
    $products[] =[
        "name"=>'کالا شماره'.$i,
        "img"=>rand(1,7).'.jpg',
        "price"=>rand(500,100000),
        "quantity"=>rand(1,50),
        "discounted"=>rand(0,1)
    ];
}
Capsule::table('products')->insert($products) ;