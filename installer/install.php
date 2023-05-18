<?php
use Illuminate\Database\Capsule\Manager as Capsule;


if (Capsule::select('SHOW TABLES') == null){
    foreach(glob(__DIR__.'/migrations/*.*') as $file) {

        require __DIR__.'/migrations/'.explode('migrations/',$file)[1];

    }
}

