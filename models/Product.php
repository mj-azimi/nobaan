<?php

namespace Model;

use Illuminate\Database\Eloquent\Model;
use Lib\Cache;
use Symfony\Component\Yaml\Yaml;

class Product extends Model
{
    public static function SelectAll(){
        $expirationCach =getConfig()['app']['expirationCach'];
        $key = 'SelectAll';
        $result = Cache::getInstance()->get($key);
        if (!$result) {
            $result = Product::all();
            Cache::getInstance()->set($key, $result, $expirationCach);

            return $result;
        }else{
            return json_decode(Cache::getInstance()->get($key));
        }
    }
}