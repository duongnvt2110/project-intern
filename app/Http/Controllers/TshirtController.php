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
		$product=tshirt_product::all();
		// retrieve value and write export
		$img_src=array();
		$i=0;
		foreach ($product as $value) {
			foreach (json_decode($value['variant']) as $data) {
				foreach ($data as $data) {
					foreach ($data as $value) {
							// print_r($value);
						$export_file->downImage($value);
						// $img_src[$i]=$value;
						// $i=$i+1;

					}
				}
			}
		}
	}
}
