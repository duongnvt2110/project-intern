<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ControllerProduct extends Controller
{
    public function loadPageProduct(){
    	return view('site.product');
    }
}
