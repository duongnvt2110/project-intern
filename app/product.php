<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class product extends Model
{
    protected $table='product';
    public function getProduct()
	{
		return $this->beLongsTo('App\event_product','eventId','eventId');
	}
	public function getProductEvent(){
		return $this->all();
	}
	
}
