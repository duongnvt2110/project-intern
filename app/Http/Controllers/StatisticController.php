<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StatisticController extends Controller
{
   	public function statistics()
	{
		return view('site.statistics');
	}
	public function keywords()
	{
		return view('site.keywords');
	}
	
}
