<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\esty_product;
use App\tshirt_product;
use App\Classes\ExportExcel;
use Illuminate\Support\Facades\Storage;
use Session;

class TshirtController extends Controller
{
	public function __construct(tshirt_product $tshirtatProduct){
		$this->tshirtatProduct=$tshirtatProduct;
	}
	public function loadProductTshirtat(){
		$tshirtatProduct=$this->tshirtatProduct->getAllProduct();
		session::put('click','t-shirt');
		return response()->view('site.tshirt',compact('tshirtatProduct'));
	}
	public function downImage(){
		$export_file=new exportExcel();

		// get value
		$product=tshirt_product::all();
		// retrieve value and write export
		$data=array();
		foreach ($product as $value) {
				// print_r($value);
			// $data=[
			// // 'option_title1'=>$value['option_title1'],
			// // 'option_value1'=>json_decode($value['option_value1']),
			// // 'option_title2'=>$value['option_title2'],
			// // 'option_value2'=>json_decode($value['option_value2']),
			// // 'option_title3'=>$value['option_title3'],
			// // 'option_value3'=>json_decode($value['option_value3']),
			// 'variant'=>json_decode($value['variant'])];
			$export_file->downImage(json_decode($value['variant']));
	}
	
	}
}
