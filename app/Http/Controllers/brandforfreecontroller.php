<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BrandForFreeController extends Controller
{
    public function index(){
        return view("web.brand4free.index");
    }

    public function get_started(){
        return view("web.brand4free.get_started");
    }
}
