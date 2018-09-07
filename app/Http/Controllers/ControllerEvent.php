<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\product;
use App\event_product;
class ControllerEvent extends Controller
{
	public function eventPage()
	{
		$product=product::all();
		$event=event_product::all();
		return view('site.event',compact('product','event'));
	}
	public function tradeMark()
	{
		return view('site.trademark');
	}
}
