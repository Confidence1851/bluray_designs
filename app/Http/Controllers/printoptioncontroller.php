<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class printoptioncontroller extends Controller
{
    public function printoption () {

        return view('admin.printoption');
    }
}
