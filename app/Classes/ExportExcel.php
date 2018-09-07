<?php

namespace App\Classes;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Pagination\Paginator;
use App\product;
use App\esty_product;

class exportExcel{

	public function WriteEstyExcel($data,$path){
		ini_set('max_execution_time', 1800);
		if(!file_exists($path))
		{
			$this->create_excel($path);
			// chmod($path,777);
		}
		$text = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
		$objPHPExcel = $text->load($path);
		$objPHPExcel->setActiveSheetIndex(0);
		$row = $objPHPExcel->getActiveSheet()->getHighestRow()+1;
		$i=$row;

		$objPHPExcel->getActiveSheet()
	// Row handle
		->setCellValue('A'.$i,$data['handle'])
	// Row title
		->setCellValue('B'.$i,$data['title'])
	// Row title
	// ->setCellValue('AU'.$i,$data['asin'])
	// Row title
		->setCellValue('C'.$i,$data['description'])
	// Row Vendor
		// ->setCellValue('D'.$i,$data['vendor'])
	// Row type
	// ->setCellValue('E'.$i,$data['type'])
	// Row tags
	// ->setCellValue('F'.$i,$data['tags'])
	// Row Published
	// ->setCellValue('G'.$i,'true')
	// Row variants gram
	// ->setCellValue('O'.$i,$data['variants'][0]['grams'])
	// Row variants sku
	// ->setCellValue('N'.$i,$data['variants'][0]['sku'])
	// Row variants tracker
	// ->setCellValue('P'.$i,1)
	// Row vaiants quantity
		->setCellValue('Q'.$i,1)

	// Row variants Policy
		->setCellValue('R'.$i,'deny')
	// Row  variants servicefullment
		->setCellValue('S'.$i,'manual')
	// Row Variant Price
		->setCellValue('T'.$i,$data['prices'])
	// Row Variant Compare At Price
	// ->setCellValue('U'.$i,$data['variants'][0]['compare_at_price'])
	// Row Variant Requires Shipping
	// ->setCellValue('V'.$i,$data['variants'][0]['requires_shipping'])
	// Row Variant Taxable
	// ->setCellValue('W'.$i,$data['variants'][0]['taxable'])
	// Row Variant Barcode
	// ->setCellValue('X'.$i,$data['variants'][0]['barcode'])
	// Row Image Src
		// ->setCellValue('H'.$i,'title')
		// ->setCellValue('I'.$i,'default')
		->setCellValue('Y'.$i,$data['image_url'][0])
	// Row Image Position
	// ->setCellValue('Z'.$i,$data['images'][0]['position'])
	// Row Image Alt Text
	// ->setCellValue('AA'.$i,$data['images'][0]['alt'])
	// Row Gift Card
	// ->setCellValue('AB'.$i,$data['images'][0]['alt'])
	// Row SEO Title
	// ->setCellValue('AC'.$i,$data['images'][0]['alt'])
	// Row SEO Description
	// ->setCellValue('AD'.$i,$data['images'][0]['alt'])
	// Row Google Shopping / Google Product Category	
	// ->setCellValue('AE'.$i,$data['images'][0]['alt'])
	// Row Google Shopping / Gender
	// ->setCellValue('AF'.$i,$data['images'][0]['alt'])
	// Row Google Shopping / Age Group
	// ->setCellValue('AG'.$i,$data['images'][0]['alt'])
	// Row Google Shopping / MPN
	// ->setCellValue('AH'.$i,$data['images'][0]['alt'])
	// Row Google Shopping / AdWords Grouping
	// ->setCellValue('AI'.$i,$data['images'][0]['alt'])
	// Row Google Shopping / AdWords Labels
	// ->setCellValue('AJ'.$i,'false')
	// Row Google Shopping / Condition
	// ->setCellValue('AK'.$i,$data['images'][0]['alt'])
	// Row Google Shopping / Custom Product
	// ->setCellValue('AL'.$i,$data['images'][0]['alt'])
	// Row Google Shopping / Custom Label 0
	// ->setCellValue('AM'.$i,$data['images'][0]['alt'])
	// Row Google Shopping / Custom Label 1
	// ->setCellValue('AN'.$i,$data['images'][0]['alt'])
	// Row Google Shopping / Custom Label 2
	// ->setCellValue('AO'.$i,$data['images'][0]['alt'])
	// Row Google Shopping / Custom Label 3
	// ->setCellValue('AP'.$i,$data['images'][0]['alt'])
	// Row Google Shopping / Custom Label 4
	// Variant Image
	// ->setCellValue('AQ'.$i,$data['images'][0]['alt'])
	// Row title
		->setCellValue('AR'.$i,$data['image_url'][0])
		->setCellValue('AU'.$i,$data['url_product'])
		->setCellValue('AV'.$i,$data['date_crawled'])
		->setCellValue('AW'.$i,$data['seller_name']);
	// Row Variant Weight Unit
	// ->setCellValue('AS'.$i,$data['variants'][0]['weight_unit']);
	//  Variant Tax Code
	// ->setCellValue('AT'.$i,$data['variants'][0]['weight_unit']);
		$n=$i;
	// write option 
		if(!empty($data['option_value1']))
		{
			if(!empty($data['option_value2'])){	

				if(count($data['option_value1'])>count($data['option_value2'])){
					$max=count($data['option_value1']);
					$min=count($data['option_value2']);
				}else{
					$max=count($data['option_value2']);
					$min=count($data['option_value1']);
				}

				for($j=1;$j<$max;$j++)
				{
					for($x=1;$x<=$min;$x++){

						if(isset($data['option_value1'][$x])){
							if(isset($data['option_value2'][$x])){

								$objPHPExcel->getActiveSheet()
								->setCellValue('A'.$n,$data['handle'].'-'.$this->convertOption($data['option_value1'][$j]))
								->setCellValue('D'.$n,$data['seller_name'])
								->setCellValue('T'.$n,$data['prices'])
								->setCellValue('E'.$n,'esty')
								->setCellValue('F'.$n,'esty')
								->setCellValue('G'.$n,'TRUE')
								->setCellValue('D'.$n,'Zenladen')
								->setCellValue('V'.$n,'TRUE')
								->setCellValue('W'.$n,'TRUE')
								->setCellValue('T'.$n,'17.95')
								->setCellValue('H'.$n,$data['option_title1'])
								->setCellValue('I'.$n,$this->convertOption($data['option_value1'][$j]) )
								->setCellValue('J'.$n,$data['option_title2'])
								->setCellValue('K'.$n,$data['option_value2'][$x])
								->setCellValue('R'.$n,'deny')
								->setCellValue('AR'.$n,$data['image_url'][0])
								->setCellValue('S'.$n,'manual');
								$n=$n+1;
							}
						}
						
					}
				}
			}else{
				for($j=1;$j<count($data['option_value1']);$j++){
					if(isset($data['option_value1'][$j])){
						$objPHPExcel->getActiveSheet()
						->setCellValue('A'.$n,$data['handle'])
						->setCellValue('D'.$n,$data['seller_name'])
						->setCellValue('T'.$n,$data['prices'])
						->setCellValue('E'.$n,'esty')
						->setCellValue('F'.$n,'esty')
						->setCellValue('G'.$n,'TRUE')
						->setCellValue('D'.$n,'Zenladen')
						->setCellValue('V'.$n,'TRUE')
						->setCellValue('W'.$n,'TRUE')
						->setCellValue('H'.$n,$data['option_title1'])
						->setCellValue('I'.$n,$this->convertOption($data['option_value1'][$j]) )
						->setCellValue('AR'.$n,$data['image_url'][0])
						->setCellValue('R'.$n,'deny')
						->setCellValue('S'.$n,'manual');
					}
					$n=$n+1;
				}
			}	
		}else{
			$objPHPExcel->getActiveSheet()
			->setCellValue('T'.$i,$data['prices'])
			->setCellValue('H'.$n,'title')
			->setCellValue('I'.$n,'default');
		}
		
	// print_r(count($data['image_url']));
		for ($j = 1; $j < count($data['image_url']); $j++) {

			if(isset($data['image_url'])){
				$i=$i+1;
				$objPHPExcel->getActiveSheet()
				->setCellValue('A'.$i,$data['handle'])
				->setCellValue('Y'.$i,$data['image_url'][$j]);

			}
		}
		$objWriter = new \PhpOffice\PhpSpreadsheet\Writer\Xlsx($objPHPExcel);
		$objWriter->save($path);
	}

	function convertOption($option){
		$option1=preg_replace('/\((USD\s\d+.\d+)\)/',"",$option);
		return $option1;
	}

	// wite tshiart

	public function WriteTshirtatExcel($data,$path){
		ini_set('max_execution_time', 1800);
		if(!file_exists($path))
		{
			$this->create_excel($path);
			// chmod($path,777);
		}
		$text = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
		$objPHPExcel = $text->load($path);
		$objPHPExcel->setActiveSheetIndex(0);
		$row = $objPHPExcel->getActiveSheet()->getHighestRow()+1;
		$i=$row;

		$objPHPExcel->getActiveSheet()
	// Row handle
		->setCellValue('A'.$i,$data['handle'].'-'.$data['option_value1'][0])
	// Row title
		->setCellValue('B'.$i,$data['title'])
	// Row title
	// ->setCellValue('AU'.$i,$data['asin'])
	// Row title
		->setCellValue('C'.$i,$data['description'])
	// Row Vendor
		->setCellValue('D'.$i,$data['category'])
	// Row type
	// ->setCellValue('E'.$i,$data['type'])
	// Row tags
	// ->setCellValue('F'.$i,$data['tags'])
	// Row Published
	// ->setCellValue('G'.$i,'true')
	// Row variants gram
	// ->setCellValue('O'.$i,$data['variants'][0]['grams'])
	// Row variants sku
	// ->setCellValue('N'.$i,$data['variants'][0]['sku'])
	// Row variants tracker
	// ->setCellValue('P'.$i,1)
	// Row vaiants quantity
		->setCellValue('Q'.$i,1)

	// Row variants Policy
		->setCellValue('R'.$i,'deny')
	// Row  variants servicefullment
		->setCellValue('S'.$i,'manual')
	// Row Variant Price
		->setCellValue('T'.$i,'17')
	// Row Variant Compare At Price
	// ->setCellValue('U'.$i,$data['variants'][0]['compare_at_price'])
	// Row Variant Requires Shipping
	// ->setCellValue('V'.$i,$data['variants'][0]['requires_shipping'])
	// Row Variant Taxable
	// ->setCellValue('W'.$i,$data['variants'][0]['taxable'])
	// Row Variant Barcode
	// ->setCellValue('X'.$i,$data['variants'][0]['barcode'])
	// Row Image Src
		// ->setCellValue('H'.$i,'title')
		// ->setCellValue('I'.$i,'default')
		// ->setCellValue('Y'.$i,$data['image_url'])
	// Row Image Position
	// ->setCellValue('Z'.$i,$data['images'][0]['position'])
	// Row Image Alt Text
	// ->setCellValue('AA'.$i,$data['images'][0]['alt'])
	// Row Gift Card
	// ->setCellValue('AB'.$i,$data['images'][0]['alt'])
	// Row SEO Title
	// ->setCellValue('AC'.$i,$data['images'][0]['alt'])
	// Row SEO Description
	// ->setCellValue('AD'.$i,$data['images'][0]['alt'])
	// Row Google Shopping / Google Product Category	
	// ->setCellValue('AE'.$i,$data['images'][0]['alt'])
	// Row Google Shopping / Gender
	// ->setCellValue('AF'.$i,$data['images'][0]['alt'])
	// Row Google Shopping / Age Group
	// ->setCellValue('AG'.$i,$data['images'][0]['alt'])
	// Row Google Shopping / MPN
	// ->setCellValue('AH'.$i,$data['images'][0]['alt'])
	// Row Google Shopping / AdWords Grouping
	// ->setCellValue('AI'.$i,$data['images'][0]['alt'])
	// Row Google Shopping / AdWords Labels
	// ->setCellValue('AJ'.$i,'false')
	// Row Google Shopping / Condition
	// ->setCellValue('AK'.$i,$data['images'][0]['alt'])
	// Row Google Shopping / Custom Product
	// ->setCellValue('AL'.$i,$data['images'][0]['alt'])
	// Row Google Shopping / Custom Label 0
	// ->setCellValue('AM'.$i,$data['images'][0]['alt'])
	// Row Google Shopping / Custom Label 1
	// ->setCellValue('AN'.$i,$data['images'][0]['alt'])
	// Row Google Shopping / Custom Label 2
	// ->setCellValue('AO'.$i,$data['images'][0]['alt'])
	// Row Google Shopping / Custom Label 3
	// ->setCellValue('AP'.$i,$data['images'][0]['alt'])
	// Row Google Shopping / Custom Label 4
	// Variant Image
	// ->setCellValue('AQ'.$i,$data['images'][0]['alt'])
	// Row title
		// 8
		->setCellValue('AU'.$i,$data['url_product'])
		->setCellValue('AV'.$i,$data['date_crawled']);
		// ->setCellValue('AW'.$i,$data['seller_name']);
	// Row Variant Weight Unit
	// ->setCellValue('AS'.$i,$data['variants'][0]['weight_unit']);
	//  Variant Tax Code
	// ->setCellValue('AT'.$i,$data['variants'][0]['weight_unit']);
		$n=$i;
	// write option 
		for($k=0;$k<count($data['option_value1']);$k++){
			$objPHPExcel->getActiveSheet()
			->setCellValue('B'.$n,$data['title'])
			->setCellValue('Q'.$n,1);

			if(!empty($data['option_value2']))
			{
				if(!empty($data['option_value3'])){	

					if(count($data['option_value2'])>count($data['option_value3'])){
						$max=count($data['option_value2']);
						$min=count($data['option_value3']);
					}else{
						$max=count($data['option_value3']);
						$min=count($data['option_value2']);
					}

					for($j=0;$j<$max;$j++)
					{
						for($x=0;$x<=$min;$x++){
							if(isset($data['option_value2'][$j])){
								if(isset($data['option_value3'][$x+1])){
									$index1=$data['option_value1'][$k];
									$index2=$data['option_value2'][$j];
									$value=json_decode(json_encode($data['variant']), True);
									for ($l = 0; $l <count($value) ; $l++) {
										if(isset($value[$l][$index1][$index2])){
											$imgVariant=$value[$l][$index1][$index2];
											preg_match('/(\d+)\-(\d+)-(\w+).+/',$imgVariant,$name);
											$url_shopify='https://cdn.shopify.com/s/files/1/0046/5784/0243/files/';
											$img_src=$url_shopify.$name[0];
											$objPHPExcel->getActiveSheet()
											->setCellValue('A'.$n,$data['handle'].'-'.$this->convertProducType($data['option_value1'][$k]))
											->setCellValue('E'.$n,$this->convertProducType($data['option_value1'][$k]))
											->setCellValue('F'.$n,$this->convertProducType($data['option_value1'][$k]))
											->setCellValue('G'.$n,'TRUE')
											->setCellValue('D'.$n,'Zenladen')
											->setCellValue('V'.$n,'TRUE')
											->setCellValue('W'.$n,'TRUE')
											->setCellValue('T'.$n,'17.95')
											->setCellValue('Y'.$n,$img_src)
											->setCellValue('H'.$n,$data['option_title2'])
											->setCellValue('I'.$n,$data['option_value2'][$j])
											->setCellValue('J'.$n,$data['option_title3'])
											->setCellValue('K'.$n,$data['option_value3'][$x+1])
											->setCellValue('R'.$n,'deny')
											->setCellValue('AR'.$n,$img_src)
											->setCellValue('S'.$n,'manual');
											$n=$n+1;
										}
									}
									
								}
							}

						}
					}
				}else{
					for($j=1;$j<count($data['option_value1']);$j++){
						if(isset($data['option_value1'][$j])){
							$objPHPExcel->getActiveSheet()
							->setCellValue('A'.$n,'17.95')
							->setCellValue('T'.$n,$data['prices'])
							->setCellValue('H'.$n,$data['option_title1'])
							->setCellValue('I'.$n,$data['option_value1'][$j])
							->setCellValue('R'.$n,'deny')
							->setCellValue('AR'.$n,$data['image_url'][0])
							->setCellValue('S'.$n,'manual');
						}
						$n=$n+1;
					}
				}	
			}else{
				$objPHPExcel->getActiveSheet()
				->setCellValue('T'.$i,$data['prices'])
				->setCellValue('H'.$n,'title')
				->setCellValue('I'.$n,'default');

			}
		}
		
		$objWriter = new \PhpOffice\PhpSpreadsheet\Writer\Xlsx($objPHPExcel);
		$objWriter->save($path);
	}

	function convertProducType($productTag){
		$product_type='';
		if (preg_match('/Ladies\sTee/',$productTag)){
			$product_type = "Ladies Custom";
		} else if (preg_match('/Hoodie/',$productTag)) {
			$product_type = "Pullover Hoodie 8 oz";
		} else if (preg_match('/Sweatshirt/',$productTag)) {
			$product_type = "Printed Crewneck Pullover Sweatshirt 8 oz";
		} else if (preg_match('/Tank\sTop/',$productTag)) {
			$product_type = "Tank Top";
		} else if (preg_match('/Guys\sV-Neck/',$productTag)) {
			$product_type = "Mens Printed V-Neck T";
		}else{
			$product_type=$productTag;
		}

		return $product_type;
	}
	public function downImage($data){
		$i=0;
		foreach ($data['variant'] as $data) {
			foreach ($data as $data) {
				foreach ($data as $value) {
					print_r($value);
					print_r('<br>');
					print_r('<br>');
						// print_r($i);
						print_r('<br');
						preg_match('/(\d+)\-(\d+)-(\w+).+/',$value,$name);
						
						$image=imagecreatefromjpeg('https:'.$value);
					
						$s=imagejpeg($image,base_path('/image/'.$name[0]));
						if($s==true){
							print_r('1');
							print_r($name[0]);
							print_r('<br>');	
						}else{
							print_r('2');
							print_r($value);
							print_r('<br>');
						}
						$i=$i+1;
				}
			}
		}
	}
	public function create_excel($path){
    // date_default_timezone_set('Asia/Ho_Chi_Minh');
    // $today = date("d-m-Y"); 
    // $ramdom=rand(1,10000);
		$phpExcel = new \PhpOffice\PhpSpreadsheet\Spreadsheet();
		$writer = new \PhpOffice\PhpSpreadsheet\Writer\Xlsx($phpExcel);
    // $file_name='D:/test/'.$path.'.xlsx';
    // print_r($path);
		$writer->save($path);
	}

}


?>