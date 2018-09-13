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
	public function loadDownImage(){
		return view('site.down_image');
	}
	public function downImage(){
		$export_file=new exportExcel();
		// get value
		$new_array=array();
		$product=tshirt_product::all();
		$new_product=json_decode(json_encode($product),true);
		// print_r($new_product);
		// print_r(count($new_product));
		for($i=2353;$i<2354;$i++){
			$s=json_decode($new_product[$i]['variant']);
			foreach ($s as $value) {
				foreach ($value as $value) {
					foreach ($value as $value) {
						$export_file->downImage($value);
					}
				}
			}
		}
		// // retrieve value and write export
		// $img_src=array();
		// $i=0;
		// foreach ($product as $value) {
		// 	foreach (json_decode($value['variant']) as $data) {
		// 		foreach ($data as $data) {
		// 			foreach ($data as $value) {
		// 					// print_r($value);
		// 				$export_file->downImage($value);
		// 				// $img_src[$i]=$value;
		// 				// $i=$i+1;

		// 			}
		// 		}
		// 	}
		// }
	}
}
