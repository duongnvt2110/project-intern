<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\product;
use App\event_product;
class EventController extends Controller
{
	public function __construct(event_product $event,product $product)
	{
		$this->event_product=$event;
		$this->product=$product;
	}
	public function eventPage()
	{
		$product=$this->product->getProductEvent();
		$event=$this->event_product->getNameEvent();
		return view('site.event',compact('product','event'));
	}
	public function tradeMark()
	{
		return view('site.trademark');
	}
}
