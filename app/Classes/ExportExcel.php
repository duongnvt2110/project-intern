<?php

namespace App\Classes;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Pagination\Paginator;
use App\product;
use App\esty_product;

class exportExcel{

	public function writeEstyExcel($data,$path){
		ini_set('max_execution_time', 1800);
		if(!file_exists($path))
		{
			$this->createExcel($path);
			$this->writeFirstRow($path);
			// chmod($path,777);
		}
		$text = new \PhpOffice\PhpSpreadsheet\Reader\Csv();
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
					$objPHPExcel->getActiveSheet()
					->setCellValue('B'.$n,$data['title'])
					->setCellValue('Q'.$n,1);
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
		$objWriter = new \PhpOffice\PhpSpreadsheet\Writer\Csv($objPHPExcel);
		$objWriter->save($path);
	}

	function convertOption($option){
		$option1=preg_replace('/\((USD\s\d+.\d+)\)/',"",$option);
		return $option1;
	}

	// wite tshiart

	public function writeTshirtatExcel($data,$path){
		ini_set('max_execution_time', 1800);
		if(!file_exists($path))
		{
			$this->createExcel($path);
			$this->writeFirstRow($path);
			// chmod($path,777);
		}
		$text = new \PhpOffice\PhpSpreadsheet\Reader\Csv();
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

					for($j=0;$j<$min;$j++)
					{
						for($x=0;$x<=$max;$x++){
							if(isset($data['option_value3'][$x+1])){
								if(isset($data['option_value2'][$j])){

									$productTitle=$data['option_value1'][$k];
									$productColor=$data['option_value2'][$j];
									$productSize=trim($data['option_value3'][$x+1]);
									// $test=$this->checkSize($productTitle,$this->convertSize($productSize));
									// print_r($productTitle);
									// print_r('<br>');
									// print_r($productColor);
									// print_r('<br>');
									// print_r($productSize);
									// print_r('<br>');
									// print_r($test);
									// print_r('<br>');	
									if($this->checkSize($this->convertProducType($productTitle),$this->convertSize($productSize))=='true')
									{
										$value=json_decode(json_encode($data['variant']), true);
										for ($l = 0; $l <count($value) ; $l++) {
											if(isset($value[$l][$productTitle][$productColor])){
												$imgVariant=$value[$l][$productTitle][$productColor];
												if(preg_match('/(\d+)\-(\d+)-(\w+).+/',$imgVariant,$name)){
													$name=$name[0];
												}else{
													preg_match('/([a-zA-Z0-9]+)\-([a-zA-Z0-9]+)\-([a-zA-Z0-9]+)\-([a-zA-Z0-9]+).+/',$imgVariant,$name);
													$name=$name[0];
												}
												$url_shopify='https://cdn.shopify.com/s/files/1/0046/5784/0243/files/';
												$img_src=$url_shopify.$name;
												$objPHPExcel->getActiveSheet()
												->setCellValue('A'.$n,$data['handle'].'-'.trim(str_replace(" ",'-',$this->convertProducType($productTitle)),'-'))
												->setCellValue('E'.$n,$this->convertProducType($productTitle))
												->setCellValue('F'.$n,$this->convertProducType($productTitle))
												->setCellValue('G'.$n,'TRUE')
												->setCellValue('D'.$n,'Zenladen')
												->setCellValue('V'.$n,'TRUE')
												->setCellValue('W'.$n,'TRUE')
												->setCellValue('T'.$n,$this->getPrice($this->convertProducType($productTitle),$this->convertSize($productSize)))
												->setCellValue('Y'.$n,$img_src)
												->setCellValue('H'.$n,$data['option_title2'])
												->setCellValue('I'.$n,$productColor)
												->setCellValue('J'.$n,$data['option_title3'])
												->setCellValue('K'.$n,$productSize)
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
		
		$objWriter = new \PhpOffice\PhpSpreadsheet\Writer\Csv($objPHPExcel);
		$objWriter->save($path);
	}

	public function convertProducType($productTag){


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
		} else if (preg_match('/Longsleeve\sTee\sUnisex /',$productTag)) {
			$product_type = "LS Ultra Cotton Tshirt";
		} else if (preg_match('/Classic Guys\s\/\sUnisex Tee/',$productTag)) {
			$product_type = "Custom Ultra Cotton";
		} else if (preg_match('/Ladies\sV-Neck/',$productTag)) {
			$product_type = "Womans Printed V-Neck T";
		} else if (preg_match('/Premium\sFitted\sGuys\sTee/',$productTag) || preg_match('/Premium\sFitted\sLadies\sTee/',$productTag)){
			$product_type = "Next Level Premium Short Sleeve Tee";
		}else{
			$product_type=$productTag;
		}

		return $product_type;
	}
	public function convertSize($size){
		$product_size='';
		if ($size=='S'){
			$product_size = "Small";
		} else if ($size =='M'){
			$product_size = "Medium";
		} else if ($size =='L'){
			$product_size = "Large";
		}else if ($size =='XL'){
			$product_size = "X-Large";
		}else if ($size =="XXL"){
			$product_size = "XX-Large";
		}else if ($size =="XXXL"){
			$product_size = "XXX-Large";
		}else if ($size =="XXXXL"){
			$product_size = "4XL";
		}else if ($size =="XXXXXL"){
			$product_size = "5XL";
		}
		return $product_size;
	}
	public function getPrice($productTag,$size){
		$file = @file_get_contents(app_path('/Classes/product_type.json'),"r");
		$resultProduct= json_decode($file, true);
		
		$price='';
		if(isset($resultProduct[$productTag])){
			$productJson=$resultProduct[$productTag];
			for($i=0;$i<count($productJson);$i++){
				if($productJson[$i][0]==$size){
					$price=$productJson[$i][1];
				}
			}
		}else{
			$price='17.95';
		}
		return $price;
	}
	public function checkSize($productTag,$size){
		$file = @file_get_contents(app_path('/Classes/product_type.json'),"r");
		$resultProduct= json_decode($file, true);
		$prices='';
		$checkValid='';
		if(isset($resultProduct[$productTag])){
			$productJson=$resultProduct[$productTag];
			// print_r($productJson);
			for($i=0;$i<count($productJson);$i++){
				if($productJson[$i][0]==$size){
					return 'true';
				}
			}
		}else{
			return 'true';
		}
		return 'false';
	}
	public function downImage($url_img){
		if(preg_match('/(\d+)\-(\d+)-(\w+).+/',$url_img,$name)){
			$name=$name[0];
		}else{
			preg_match('/([a-zA-Z0-9]+)\-([a-zA-Z0-9]+)\-([a-zA-Z0-9]+)\-([a-zA-Z0-9]+).+/',$url_img,$name);
			$name=$name[0];
		}
		ini_set('max_execution_time',1800);
		$image=@imagecreatefromjpeg('https:'.$url_img);
		if($image){
			imagejpeg($image,base_path('/image/'.$name));
			print_r('<br>');
			print_r($name);
			print_r('<br>');
		}else{
			print_r('<br>');
			print_r('error http request '.$name);
			print_r('<br>');
		}
		
	}

	public function writeFirstRow($path){
		$text = new \PhpOffice\PhpSpreadsheet\Reader\Csv();
		$objPHPExcel = $text->load($path);
		$objPHPExcel->setActiveSheetIndex(0);
		// $row = $objPHPExcel->getActiveSheet()->getHighestRow();
		$i=1;

		$objPHPExcel->getActiveSheet()
	// Row handle
		->setCellValue('A'.$i,'Handle')
	// Row title
		->setCellValue('B'.$i,'Title')
	// Row title
	// ->setCellValue('AU'.$i,$data['asin'])
	// Row title
		->setCellValue('C'.$i,'Body (HTML)')
	// Row Vendor
		->setCellValue('D'.$i,'Vendor')
	//Row type
		->setCellValue('E'.$i,'Type')
	//Row tags
		->setCellValue('F'.$i,'Tags')
	//Row Published
		->setCellValue('G'.$i,'Published')
	//Row variants gram
		->setCellValue('H'.$i,'Option1 Name')
		->setCellValue('I'.$i,'Option1 Value')
		->setCellValue('J'.$i,'Option2 Name')
		->setCellValue('K'.$i,'Option2 Value')
		
		->setCellValue('L'.$i,'Option3 Name')
		->setCellValue('M'.$i,'Option3 Value')
		//Row variants sku
		->setCellValue('N'.$i,'Variant SKU')
		->setCellValue('O'.$i,'Variant Grams')
	//Row variants tracker
		->setCellValue('P'.$i,'Variant Inventory Tracker')
	//Row vaiants quantity
		->setCellValue('Q'.$i,'Variant Inventory Qty')


	// Row variants Policy
		->setCellValue('R'.$i,'Variant Inventory Policy')
	// Row  variants servicefullment
		->setCellValue('S'.$i,'Variant Fulfillment Service')
	// Row Variant Price
		->setCellValue('T'.$i,'Variant Price')
	//Row Variant Compare At Price
		->setCellValue('U'.$i,'Variant Compare At Price')
	//Row Variant Requires Shipping
		->setCellValue('V'.$i,'Variant Requires Shipping')
	//Row Variant Taxable
		->setCellValue('W'.$i,'Variant Taxable')
	//Row Variant Barcode
		->setCellValue('X'.$i,'Variant Barcode')
	//Row Image Src
		->setCellValue('Y'.$i,'Image Src')
	//Row Image Position
		->setCellValue('Z'.$i,'Image Position')
	//Row Image Alt Text
		->setCellValue('AA'.$i,'Image Alt Text')
	//Row Gift Card
		->setCellValue('AB'.$i,'Gift Card')
	//Row SEO Title
		->setCellValue('AC'.$i,'SEO Title')
	//Row SEO Description
		->setCellValue('AD'.$i,'SEO Description')
	//Row Google Shopping / Google Product Category	
		->setCellValue('AE'.$i,'Google Shopping / Google Product Category')
	//Row Google Shopping / Gender
		->setCellValue('AF'.$i,'Google Shopping / Gender')
	//Row Google Shopping / Age Group
		->setCellValue('AG'.$i,'Google Shopping / Age Group')
	//Row Google Shopping / MPN
		->setCellValue('AH'.$i,'Google Shopping / Age Group')
	//Row Google Shopping / AdWords Grouping
		->setCellValue('AI'.$i,'Google Shopping / MPN')
	//Row Google Shopping / AdWords Labels
		->setCellValue('AJ'.$i,'Google Shopping / AdWords Grouping')
	//Row Google Shopping / Condition
		->setCellValue('AK'.$i,'Google Shopping / AdWords Labels')
	//Row Google Shopping / Custom Product
		->setCellValue('AL'.$i,'Google Shopping / Condition')
	//Row Google Shopping / Custom Label 0

		->setCellValue('AM'.$i,'Google Shopping / Custom Product')
	//Row Google Shopping / Custom Label 1
		->setCellValue('AN'.$i,'Google Shopping / Custom Label 0')
	//Row Google Shopping / Custom Label 2
		->setCellValue('AO'.$i,'Google Shopping / Custom Label 1')
	//Row Google Shopping / Custom Label 3
		->setCellValue('AP'.$i,'Google Shopping / Custom Label 2')
	//Row Google Shopping / Custom Label 4

	//Variant Image
		->setCellValue('AQ'.$i,'Google Shopping / Custom Label 3')
		->setCellValue('AR'.$i,'Variant Image')
	// Row Variant Weight Unit
		->setCellValue('AS'.$i,'Variant Weight Unit')
	//  Variant Tax Code
		->setCellValue('AT'.$i,'Variant Tax Code');

		$objWriter = new \PhpOffice\PhpSpreadsheet\Writer\Csv($objPHPExcel);
		$objWriter->save($path);
	}

	public function createExcel($path){
    // date_default_timezone_set('Asia/Ho_Chi_Minh');
    // $today = date("d-m-Y"); 
    // $ramdom=rand(1,10000);
		$phpExcel = new \PhpOffice\PhpSpreadsheet\Spreadsheet();
		$writer = new \PhpOffice\PhpSpreadsheet\Writer\Csv($phpExcel);
    // $file_name='D:/test/'.$path.'.xlsx';
    // print_r($path);
		$writer->save($path);
	}

}


?>