<?php

namespace Model;

use Illuminate\Database\Eloquent\Model;
use Lib\Cache;

class User extends Model
{


    public static function SelectAll(){
        $key = 'SelectAll';
        $result = Cache::getInstance()->get($key);
        if (!$result) {
            $result = User::all();
            Cache::getInstance()->set($key, $result, 3600);

            return $result->toArray();
        }else{
            return json_decode(Cache::getInstance()->get($key));
        }
    }

}