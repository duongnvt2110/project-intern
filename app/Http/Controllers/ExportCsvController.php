<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\esty_product;
use App\tshirt_product;
use App\viralstyle_product;
use App\Classes\ExportExcel;
use Illuminate\Support\Facades\Storage;
use Session;
class ExportCsvController extends Controller
{



	public function exportCsv(Request $req){
		
		$id=$req->get('search');
		if(Session::get('click')=='esty'){
			$this->ExportCsvEsty($id);
		}else if(Session::get('click')=='t-shirt'){
			$this->ExportCsvTshirtat($id);
		}else if(Session::get('click')=='viralstyle'){
			$this->ExportCsvViralStyle($id);
		}
		
	}
	public function ExportCsvEsty($req){

		$id=$req;
		$id_result=array();
		preg_match_all('/\d+/',$id,$id_result);

		// create path
		date_default_timezone_set('Asia/Ho_Chi_Minh');
		$today = date("Y-m-d-H-i-s"); 
		$file_name='export/export-file-csv-'.$today.'.csv';
		$path=base_path($file_name);
		// print_r($path);
		// end create path

		for($i=0;$i<count($id_result[0]);$i++){
			$this->getValueEsty($id_result[0][$i],$path);
		}
		// down load file
		$host=request()->root();
		if(preg_match('/public/',$host)){
			$host=str_replace('public','',$host);
		}
		// print_r($host);
		echo $host.'/'.$file_name;
		
	}
	// get data from db
	public function getValueEsty($id,$path){

		// declare class exportExcel();
		$export_file=new exportExcel();

		// get value
		$product=esty_product::where('id','=',$id)->get();
		esty_product::where('id','=',$id)->update(['is_export'=>true]);
		// retrieve value and write export
		$data=array();
		foreach ($product as $value) {
			$handle=str_replace(' ','-',$value['title']);
			$handle=str_replace(',','',$handle);

			$data=['url_product'=>$value['url_product'],
			'vendor'=>$value['vendor'],
			'title'=>$value['title'],
			'handle'=>$handle,
			'image_url'=>json_decode($value['url_img']),
			'prices' =>$value['prices'],
			'date_crawled'=> $value['date_crawled'],
			'seller_name'=>$value['seller_name'],
			'option_title1'=>$value['option_title1'],
			'option_value1'=>json_decode($value['option_value1']),
			'option_title2'=>$value['option_title2'],
			'option_value2'=>json_decode($value['option_value2']),
			'description'=>$value['description']
		];
		// echo json_encode($data);
		// write excel
		$export_file->writeEstyExcel($data,$path);
	}
}

public function ExportCsvTshirtat($req){

	$id=$req;
	$id_result=array();
	preg_match_all('/\d+/',$id,$id_result);

		// create path
	date_default_timezone_set('Asia/Ho_Chi_Minh');
	$today = date("Y-m-d-H-i-s"); 
	$file_name='export/export-file-csv-'.$today.'.csv';
	$path=base_path($file_name);
		// print_r($path);
		// end create path
	// print_r($id_result);
	for($i=0;$i<count($id_result[0]);$i++){
		if(isset($id_result[0][$i])){
			$this->getTshirtat($id_result[0][$i],$path);
		}
		
	}
		// down load file
	$host=request()->root();
	if(preg_match('/public/',$host)){
		$host=str_replace('public','',$host);
	}
		// print_r($host);
	echo $host.'/'.$file_name;

}

public function getTshirtat($id,$path){

	$export_file=new exportExcel();

		// get value
	$product=tshirt_product::where('id','=',$id)->get();
	tshirt_product::where('id','=',$id)->update(['is_export'=>true]);
		// retrieve value and write export
	$data=array();
	foreach ($product as $value) {
		// $handle=str_replace(' ','-',$value['title']);
		// $handle=str_replace(',','',$handle);
		$handle=preg_replace('/\W+/','-', $value['title']);
		$handle=trim($handle,'-');

		$data=['url_product'=>$value['url_product'],
		'category'=>$value['category'],
		'title'=>$value['title'],
		'handle'=>$handle,
		'date_crawled'=> $value['date_crawled'],
		'option_title1'=>$value['option_title1'],
		'option_value1'=>json_decode($value['option_value1']),
		'option_title2'=>$value['option_title2'],
		'option_value2'=>json_decode($value['option_value2']),
		'option_title3'=>$value['option_title3'],
		'option_value3'=>json_decode($value['option_value3']),
		'variant'=>json_decode($value['variant']),
		'description'=>$value['description']
	];
		// echo json_encode($data);
		// write excel
	$export_file->writeTshirtatExcel($data,$path);
}

}

public function ExportCsvViralStyle($req){

	$id=$req;
	$id_result=array();
	preg_match_all('/\d+/',$id,$id_result);

		// create path
	date_default_timezone_set('Asia/Ho_Chi_Minh');
	$today = date("Y-m-d-H-i-s"); 
	$file_name='export/export-file-csv-'.$today.'.csv';
	$path=base_path($file_name);
		// print_r($path);
		// end create path
	for($i=0;$i<count($id_result[0]);$i++){
		if(isset($id_result[0][$i])){
			$this->getViralStyle($id_result[0][$i],$path);
		}
		
	}
		// down load file
	$host=request()->root();
	if(preg_match('/public/',$host)){
		$host=str_replace('public','',$host);
	}
		// print_r($host);
	echo $host.'/'.$file_name;

}

public function getViralStyle($id,$path){

	$export_file=new exportExcel();

		// get value
	$product=viralstyle_product::where('id','=',$id)->get();
	viralstyle_product::where('id','=',$id)->update(['is_export'=>true]);
		// retrieve value and write export
	$data=array();
	foreach ($product as $value) {
		// $handle=str_replace(' ','-',$value['title']);
		// $handle=str_replace(',','',$handle);
		$handle=preg_replace('/\W+/','-', $value['title']);
		$handle=trim($handle,'-');

		$data=['url_product'=>$value['url_product'],
		'category'=>$value['category'],
		'title'=>$value['title'],
		'handle'=>$handle,
		'date_crawled'=> $value['date_crawled'],
		'option_title1'=>$value['option_title1'],
		'option_value1'=>json_decode($value['option_value1']),
		'option_title2'=>$value['option_title2'],
		'option_value2'=>json_decode($value['option_value2']),
		'option_title3'=>$value['option_title3'],
		'option_value3'=>json_decode($value['option_value3']),
		'variant'=>json_decode($value['variant']),
		'description'=>$value['description']
	];
		 // print_r($data);
		// write excel
	$export_file->writeViralExcel($data,$path);
}

}
}