<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Session;
class esty_product extends Model
{
	public $timestamps = false;
	protected $table='esty_product';

	public function getProductEsty($search,$type,$path){
		return $this->where('vendor','=',$type)
		->orderBy($search,'desc')
		->paginate(20)
		->withPath($path)
		->appends('search',$search);

	}
	public function getAllProduct($vendor){
		return $this->where('vendor','=',$vendor)->paginate(20);

	}
}
