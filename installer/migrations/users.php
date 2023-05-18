<?php
use Illuminate\Database\Capsule\Manager as Capsule;


Capsule::schema()->create('users', function ($table) {
    $table->increments('id');
    $table->string('name');
    $table->string('phone');
    $table->timestamps();
});