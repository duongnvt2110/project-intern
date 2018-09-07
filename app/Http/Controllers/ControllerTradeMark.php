<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ControllerTradeMark extends Controller
{
    public function tradeMark()
	{
		return view('site.trademark');
	}
}
