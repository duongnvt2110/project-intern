<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class event_product extends Model
{
    protected $table='event_product';
    public function getProducts()
	{
		return $this->hasmany('App\product','eventId','eventId');
	}
	public function getNameEvent(){
		return $this->all();
	}
}
