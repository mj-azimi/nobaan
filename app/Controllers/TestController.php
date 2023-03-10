<?php
namespace App\Controllers;

use App\Models\Test;

class TestController
{
    public function index()
    {

        $test = Test::all();
        view('admin/menu');
    }
}