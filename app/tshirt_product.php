<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
class tshirt_product extends Model
{
    protected $table='tshirt_product';
    public $timestamps=false;

    public function getAllProduct(){
    	return $this->paginate(20);
    }
}
