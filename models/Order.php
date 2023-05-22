<?php

namespace Model;

use Illuminate\Database\Eloquent\Model;
use Lib\Cache;

class Order extends Model
{
    protected $fillable = ['phone','product_id','discount'];

}