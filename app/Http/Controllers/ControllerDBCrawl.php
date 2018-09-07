<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\data_crawl;
use App\Classes\mycurl;
class ControllerDBCrawl extends Controller
{

	public function loadPage()
	{
		return view('site.savedb');
	}
	public function getDBCrawl(Request $req)
	{
		$shopify_id=$req->post('id');
		$sku=$req->post('sku');
		$url=$req->post('url');
		$title=$req->post('title');
        $variants = $req->post('variants');
        $is_crawler = $req->post('is_crawler');
        $tags =$req->post('tags');
        $handle =$req->post('handle');
        $img_src =$req->post('img_src');
        $images =$req->post('images');
       	$options =$req->post('options');
       	$product_type =$req->post('product_type');
        $body_html =$req->post('body_html');
        $vendor =$req->post('vendor');
       
        
        // $options = $req->post('options');
        // $variant_prices = $req->post('variant_prices');
        // $variant_compare_prices = $req->post('variant_compare_prices');
        // $variant_shipping = $req->post('variant_shipping');
        // $variant_taxable = $req->post('variant_taxable');
        
        
        // stores to array
        $data_shop=array('shopify_id'=>$shopify_id,
        	'vendor'=>$vendor,
            'url'=>$url,
            'title'=> $title,
            'variants'=>$variants,
            'is_crawler'=>$is_crawler,
            'tags'=> $tags,
            'handle'=>$handle,
            'img_src'=> $img_src,
            'images'=> $images,
            'options'=>$options,
            'product_type'=>$product_type,
        	'body_html'=>$body_html); 

        print_r($data_shop);
        $test=$this->importDBCrawl($data_shop);
        return $test;
	}
    public function importDBCrawl($data)
    {
    	print_r($data['shopify_id']);
    	data_crawl::insert([
    		'shopify_id'=>$data['shopify_id'],
    		'vendor'=>$data['product_type'],		
    		'url'=>	$data['url'],	
    		'title'=>$data['title'],	
    		'variants'=>json_encode($data['variants']),	
    		'is_crawler'=>$data['is_crawler'],	
    		'tags'=>$data['tags'],	
    		'handle'=>$data['handle'],	
    		'img_src'=>$data['img_src'],	
    		'images'=>json_encode($data['images']),	
    		'options'=>json_encode($data['options']),	
    		'product_type'=>$data['product_type'],
    	
    		'body_html'=>$data['body_html']
    	]);
    	return 1;
    }
    public function excutedSQL()
    {
    	header_remove('Access-Control-Allow-Origin');
		header('Access-Control-Allow-Origin: *');
    	// $s=file_get_contents('https://www.gameroomshop.com/');
    	// print_r($s);
		// $data=data_crawl::get();
		// $array = json_decode(json_encode($data), true);
		// for($i=0;$i<3;$i++)
		// {
		// //  images
		// $img_src=$array[$i]['img_src'];
		// $handle=$array[$i]['handle'];
		// $title=$array[$i]['title'];
		// $tags=$array[$i]['img_src'];
		// $product_type=$array[0]['product_type'];

		// $images=json_decode($array[$i]['images']);
		// $variants=json_decode($array[$i]['variants']);
		// $options=json_decode($array[$i]['options']);
		// $vendor=$array[0]['vendor'];
		// $body_html=$array[0]['body_html'];
		
		// $data=array(
		// 	'img_src'=>$img_src,
		// 	'handle'=>$handle,
		// 	'title'=>$title,
		// 	'tags'=>$tags,
		// 	'product_type'=>$product_type,
		// 	'images'=>$images,
		// 	'variants'=>$variants,
		// 	'options'=>$options,
		// 	'vendor'=>$vendor,
		// 	'body_html'=>$body_html
		// );
		// $test=get_object_vars($data['variants'][0])['price'];
		// print_r($test);
		// $s=$this->exportExcel($data);	
		// print_r($s);
		// }
		// $this->create_excel();
		return view('site.test');
    }
    public function exportExcel($data)
    {
    	$text = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
    	$objPHPExcel = $text->load('D:/test/test_2.xlsx');
    	$objPHPExcel->setActiveSheetIndex(0);
    	$row = $objPHPExcel->getActiveSheet()->getHighestRow()+1;
    	$i=$row;
    	$objPHPExcel->getActiveSheet()
    	// cột handle
    	->setCellValue('A'.$i,$data['handle'])
    	// cột title
    	->setCellValue('B'.$i,$data['title'])
    	// cột body_html
    	->setCellValue('C'.$i,$data['body_html'])
    	// cột vendor
    	->setCellValue('D'.$i,$data['vendor'])
    	// cột type
    	->setCellValue('E'.$i,$data['product_type'])
    	// cột tags
    	->setCellValue('F'.$i,$data['tags'])
    	// cột published
    	->setCellValue('G'.$i,'true')
    	// cột grams
    	->setCellValue('O'.$i,get_object_vars($data['variants'][0])['grams'])
    	// cột sku
    	->setCellValue('N'.$i,get_object_vars($data['variants'][0])['sku'])
    	// cột quantity
    	->setCellValue('Q'.$i,1)
    	// cột fulfillment_service
    	->setCellValue('S'.$i,get_object_vars($data['variants'][0])['fulfillment_service'])
    	// cột deny
    	->setCellValue('R'.$i,'deny')
    	// cột price
    	->setCellValue('T'.$i,get_object_vars($data['variants'][0])['price'])
    	// cột compare_at_pric
    	->setCellValue('U'.$i,get_object_vars($data['variants'][0])['compare_at_price'])
    	// cột requires_shipping
    	->setCellValue('V'.$i,get_object_vars($data['variants'][0])['requires_shipping'])
    	// cột taxable
    	->setCellValue('W'.$i,get_object_vars($data['variants'][0])['taxable'])
    	// cột barcode
    	->setCellValue('X'.$i,get_object_vars($data['variants'][0])['barcode'])
    	// cột src
    	->setCellValue('Y'.$i,get_object_vars($data['images'][0])['src'])
    	// cột position
    	->setCellValue('Z'.$i,get_object_vars($data['images'][0])['position'])
    	// cột alt
    	->setCellValue('AA'.$i,get_object_vars($data['images'][0])['alt'])
    	// cột weight_unit
    	->setCellValue('AS'.$i,get_object_vars($data['variants'][0])['weight_unit']);
    	// Xử lý option Do option ta biết có 6 cột nên tối đa là giá trị của mảng 2.
    	if(isset($data['options'][0])) //check mảng thứ nhất
    	{
    		// ghi giá trị option 1 theo option
    		$objPHPExcel->getActiveSheet()
    		->setCellValue('H'.$i,get_object_vars($data['options'][0])['name'])
    		->setCellValue('I'.$i,get_object_vars($data['variants'][0])['option1']);
    	}
    	if(isset($data['options'][1])) //check mảng thứ 2 ghi giá trị theo option2
    	{
    		$objPHPExcel->getActiveSheet()
    		->setCellValue('J'.$i,get_object_vars($data['options'][1])['name'])
    		->setCellValue('K'.$i,get_object_vars($data['variants'][0])['option2']);
    	}
    	if(isset($data['options'][2])) //check mảng thứ 3 ghi giá trị option3
    	{
    		$objPHPExcel->getActiveSheet()
    		->setCellValue('L'.$i,get_object_vars($data['options'][2])['name'])
    		->setCellValue('M'.$i,get_object_vars($data['variants'][0])['option3']);
    	}

    	//  Excute Handle follow images
    	for ($j = 1; $j < count($data['images']); $j++){

    		if(!isset(get_object_vars($data['images'][$j])['variant_ids'])){
    			$i=$i+1;
    			$objPHPExcel->getActiveSheet()
    			// Row handle
    			->setCellValue('A'.$i,$data['handle'])
                // ->setCellValue('B'.$i,$data['title'])
                // // ->setCellValue('C'.$i,$data['body_html'])
                // ->setCellValue('D'.$i,$data['vendor'])
                // ->setCellValue('E'.$i,$data['type'])
                // ->setCellValue('F'.$i,$data['tags'])
                // ->setCellValue('G'.$i,'true')

                // ->setCellValue('H'.$i,$data['options'][0]['name'])
                // ->setCellValue('I'.$i,$data['variants'][0]['option1'])
                // ->setCellValue('J'.$i,$data['options'][0]['name'])
                // ->setCellValue('K'.$i,$data['variants'][0]['option2'])
                // ->setCellValue('N'.$i,$data['variants'][0]['sku'])
                // ->setCellValue('O'.$i,$data['variants'][0]['grams'])
                // ->setCellValue('Q'.$i,1)
                // ->setCellValue('S'.$i,$data['variants'][0]['fulfillment_service'])
                // ->setCellValue('R'.$i,'deny')

                // ->setCellValue('T'.$i,$data['variant_prices'])
                // ->setCellValue('U'.$i,$data['variant_compare_prices'])
                // ->setCellValue('V'.$i,$data['variant_shipping'])
                // ->setCellValue('W'.$i,$data['variant_taxable'])
                //  ->setCellValue('X'.$i,$data['variants'][0]['barcode'])
                //Row src
    			->setCellValue('Y'.$i,get_object_vars($data['images'][$j])['src'])
    			//Row positon
    			->setCellValue('Z'.$i,get_object_vars($data['images'][$j])['position'])
    			//row alt
    			->setCellValue('AA'.$i,get_object_vars($data['images'][$j])['alt']);
                // ->setCellValue('AP'.$i,$data[12])
                // ->setCellValue('AS'.$i,$data['variants'][0]['weight_unit']);

                //Excute option 
                // Check array[option] and write data.
    			if(isset($data['options'][0])&& isset($data['variants'][$j]))
    			{
    				$objPHPExcel->getActiveSheet()
    				->setCellValue('H'.$i,get_object_vars($data['options'][0])['name'])
    				->setCellValue('I'.$i,get_object_vars($data['variants'][$j])['option1'])
    				->setCellValue('N'.$i,get_object_vars($data['variants'][$j])['sku'])
    				->setCellValue('S'.$i,get_object_vars($data['variants'][0])['fulfillment_service'])
    				->setCellValue('R'.$i,'deny')
    				->setCellValue('T'.$i,get_object_vars($data['variants'][$j])['price'])
    				->setCellValue('U'.$i,get_object_vars($data['variants'][$j])['compare_at_price'])
    				->setCellValue('V'.$i,get_object_vars($data['variants'][$j])['requires_shipping'])
    				->setCellValue('W'.$i,get_object_vars($data['variants'][$j])['taxable']);
            		// ->setCellValue('X'.$i,$data['variants'][$j]['barcode']);
    			}
    			if(isset($data['options'][1]) && isset($data['variants'][$j]))
    			{
    				$objPHPExcel->getActiveSheet()
    				->setCellValue('J'.$i,get_object_vars($data['options'][1])['name'])
    				->setCellValue('K'.$i,get_object_vars($data['variants'][$j])['option2']);
    			}
    			if(isset($data['options'][2]) && isset($data['variants'][$j]))
    			{
    				$objPHPExcel->getActiveSheet()
    				->setCellValue('L'.$i,get_object_vars($data['options'][2])['name'])
    				->setCellValue('M'.$i,get_object_vars($data['variants'][$j])['option3']);
    			}
    		}

    		else
    		{
    			// $objPHPExcel->getActiveSheet()
    			// ->setCellValue('A'.$i,$data['handle'])
                // ->setCellValue('B'.$i,$data['title'])
                // ->setCellValue('C'.$i,$data['body_html'])
                // ->setCellValue('D'.$i,$data['vendor'])
                // ->setCellValue('E'.$i,$data['type'])
                // ->setCellValue('F'.$i,$data['tags'])
                // ->setCellValue('G'.$i,'true')
                // ->setCellValue('H'.$i,$data['options'][0]['name'])
                // ->setCellValue('I'.$i,$data['variants'][0]['option1'])
                // ->setCellValue('J'.$i,$data['options'][0]['name'])
                // ->setCellValue('K'.$i,$data['variants'][0]['option2'])
                // ->setCellValue('N'.$i,$data['variants'][0]['sku'])
                // ->setCellValue('O'.$i,$data['variants'][0]['grams'])
                //  ->setCellValue('Q'.$i,1)
                // ->setCellValue('S'.$i,$data['variants'][0]['fulfillment_service'])
                // ->setCellValue('R'.$i,'deny')
                // ->setCellValue('T'.$i,$data['variant_prices'])
                // ->setCellValue('U'.$i,$data['variant_compare_prices'])
                // ->setCellValue('V'.$i,$data['variant_shipping'])
                // ->setCellValue('W'.$i,$data['variant_taxable'])
                //  ->setCellValue('X'.$i,$data['variants'][0]['barcode'])
    			// ->setCellValue('Y'.$i,$data['images'][$j]['src'])
    			// ->setCellValue('Z'.$i,$data['images'][$j]['position'])
    			// ->setCellValue('AA'.$i,$data['images'][$j]['alt']);
                // ->setCellValue('AP'.$i,$data[12])
                // ->setCellValue('AS'.$i,$data['variants'][0]['weight_unit']);
    		}
    	}
        // ->setCellValue('AP'.$i,$variant);
    	$objWriter = new \PhpOffice\PhpSpreadsheet\Writer\Xlsx($objPHPExcel);
    	$objWriter->save('D:/test/test_2.xlsx');
    	return $i;
    }
    public function create_excel(){
    	date_default_timezone_set('Asia/Ho_Chi_Minh');
		$today = date("d-m-Y"); 
		$ramdom=rand(1,10000);
		$phpExcel = new \PhpOffice\PhpSpreadsheet\Spreadsheet();
		$writer = new \PhpOffice\PhpSpreadsheet\Writer\Xlsx($phpExcel);
		$file_name='D:/test/test_'.$today.'-'.$ramdom.'.xlsx';
		$writer->save($file_name);
		return $file_name;
    }
    public function getbanner()
    {
    	$http=new mycurl('');
    	$url='https://www.gameroomshop.com/';
		$html=$http->createCurl($url);
        $test=htmlentities($html);
        print_r($test);
        // $s='<a href="" class="slide-link"> <img src="//cdn.shopify.com/s/files/1/2677/1846/t/15/assets/slide_1.jpg?3882281798803308195" alt=""';
        preg_match('/(.?)class\=\"slide\-link\"\>\s\<img\ssrc\=\"(.*?)\"\salt/',$test,$result);
        print_r($result);
		// $dom = new \DomDocument();
		// @$dom->loadHTML($html);
		// $xpath= new \DOMXpath($dom);
  //        var_dump($xpath);
		// // $class='wrapper main-content';
		// $html_string=$xpath->query("//div[contains(@class,'wrapper main-content')]");
		
    }
}
