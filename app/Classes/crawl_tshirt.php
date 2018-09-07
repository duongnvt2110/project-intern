<?php

namespace App\Classes;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Pagination\Paginator;
use App\Classes\mycurl;
use App\product;
use App\esty_product;
set_time_limit(0);
ini_set('memory_limit', '-1');

class crawl_tshirt{

	public function getData($k)
	{
		$n=0;
		// for ($k = 3; $k <430; $k++) {
			// set_time_limit(300);
			$http=new mycurl('');
			$url='https://t-shirtat.com/shop/page/'.$k;
			print_r('<br>');
			print_r($url.PHP_EOL);
			print_r('<br>');
			$html=$http->createCurl($url);
		// print_r($html);
		// $html=file_get_contents($url);
			$dom = new \DomDocument();
			@$dom->loadHTML($html);
			$xpath = new \DOMXpath($dom);
			$url=array();
			$urlCheckOut=array();
			$i=0;
			$html_string =  $xpath->query("//div[contains(@class,'image-fade_in_back')]/a/@href");
			$linkCheckOut='';
			foreach ($html_string as $value) {
				$linkCheckOut=$this->getLinkVariantTshirt($value->textContent);

			// print_r($linkCheckOut);
				print_r('</br>');
				if(preg_match('/checkout.t-shirtat/',$linkCheckOut)){
					$url[$i]=$value->textContent;
					$urlCheckOut[$i]=$linkCheckOut;
					$i=$i+1;

				}

			}
		// 	print_r($url);
		// 	print_r($urlCheckOut);
		// $i=0;
		// print_r(count($url));
		// print_r(count($urlCheckOut));	
		// exit;
			for($j=0;$j<count($url);$j++)
			{
				print_r($url[$j]);
				print_r('<br>');
				$this->getTShirtData($url[$j],$urlCheckOut[$j]);
				print_r('produc'.$j.'success');
				print_r('<br>');
				
			// exit;
			}
		// }
	}
	public function getLinkVariantTshirt($url){
		set_time_limit(300);
		$http=new mycurl('');
		$html=$http->createCurl($url);
		$dom = new \DomDocument();
		@$dom->loadHTML($html);
		$xpath = new \DOMXpath($dom);
		$linkCheckOut='';
		$linkCheckOut=$this->getLinkvaraint($xpath);
		return $linkCheckOut;
	}


	public function getTShirtData($url,$urlCheckOut)
	{		
		set_time_limit(300);
		$http=new mycurl('');
		$html=$http->createCurl($url);
	// $html=file_get_contents($url);
			// print_r($html);
		$dom = new \DomDocument();
		@$dom->loadHTML($html);
		$xpath = new \DOMXpath($dom);

		// seller name
	// $seller_name=getSellerName($xpath);
		// title name
		$title_name=$this->getProductTitle($xpath);
	// print_r($title_name);
		// handle
		$handle=str_replace(' ','-',$title_name);
		$handle=str_replace(',','',$handle);
	// print_r($handle);
			// getDescription
		$description=$this->getDescription($xpath);
	// print_r($description);

		$category=$this->getCategoryTitle($xpath);
	// print_r($category);
	// --------------get Link variant-------------------------

		$html=$http->createCurl($urlCheckOut);
	// $html=file_get_contents($url);
			// print_r($html);
		$dom = new \DomDocument();
		@$dom->loadHTML($html);
		$xpath_1 = new \DOMXpath($dom);
		// img src
		$img_src=$this->getImage($xpath_1);
	// $img_src_en=json_encode($img_src);
		// getDataReview
	// $data_review=getDataReview($xpath);
		// getPrice
	// $prices=getPrice($xpath);

		// getOptionTitle1
		$title_option1=$this->getOptionTitle1($xpath_1);
		// getOptionValue1
		$value_option1=$this->getOptionValue1($xpath_1);
		$value_option1_en=json_encode($value_option1);
	// 	// getOptionTitle2
		$title_option2=$this->getOptionTitle2($xpath_1);
	// 	// getOptionValue2
		$value_option2=$this->getOptionValue2($xpath_1);
		$value_option2_en=json_encode($value_option2);
	// getOptionTitle3
		$title_option3=$this->getOptionTitle3($xpath_1);
	// 	// getOptionValue3
		$value_option3=$this->getOptionValue3($xpath_1);
		$value_option3_en=json_encode($value_option3);
	// get variant
		$variant=$this->getVariant($xpath_1);
		$variant_en=json_encode($variant);

		// Date Crawled
		date_default_timezone_set('Asia/Ho_Chi_Minh');
		$today = date("Y-m-d"); 
				// print_r($today);

		$data=['url_product'=>$url,
		'category'=>$category,
		'url_img'=>$img_src,
		'title'=>$title_name,
		'prices'=>'17',
		'handle'=>$handle,
		'day_crawled'=> $today,
		'option_title1'=>$title_option1,
		'option_value1'=>$value_option1_en,
		'option_title2'=>$title_option2,
		'option_value2'=>$value_option2_en,
		'option_title3'=>$title_option3,
		'option_value3'=>$value_option3_en,
		'variant'=>$variant_en,
		'description'=>$description	

	];
	print_r('<br>');
	print_r($data);
	print_r('<br>');
// exit;print_r($data);

	// $this->excute($data);
}

public function excuteDB($data){
	// print_r($data['url_product']);
	$check_valid=tshirt_product::select('url_product')->where('url_product',$data['url_product'])->get();
	$url='';
	foreach ($check_valid as $value) {
		// print_r($value);
		$url=$value['url_product'];
	}
	// print_r($title);
	if(!empty($title)){
		$this->updateDB($data);
		print_r('update success');
		print_r('<br>');
	}else{
		$this->writeDB($data);
		print_r('write success');
		print_r('<br>');
	}

}
// create xpath
public function getHTML($url){
	set_time_limit(300);
	$http=new mycurl('');
	$html=$http->createCurl($url);
	// $html=file_get_contents($url);
			// print_r($html);
	$dom = new \DomDocument();
	@$dom->loadHTML($html);
	$xpath= new \DOMXpath($dom);

	return $xpath;
}

public function getLinkvaraint($xpath){
	$html_string =  $xpath->query("//form[contains(@class,'cart')]/@action");
	$variant_link='';
	foreach ($html_string as $value) {
			// print_r($value);
		$variant_link=$value->textContent;
	}
	return $variant_link;
}

public function getCategoryTitle($xpath){
	$html_string =  $xpath->query("//span[contains(@class,'posted_in')]/a");
	$categoryTitle='';
	foreach ($html_string as $value) {
			// print_r($value);
		$categoryTitle=$value->textContent;
	}
	return $categoryTitle;
}


// function getSellerName($xpath){
// 	$html_string =  $xpath->query("//a[contains(@class,'shop-header-name')]/span");
// 	$seller_name='';
// 	foreach ($html_string as $value) {
// 			// print_r($value);
// 		$seller_name=$value->textContent;
// 	}
// 	return $seller_name;
// }

public function getProductTitle($xpath){
	$html_string =  $xpath->query("//h1[contains(@class,'entry-title')]");
	$title_name='';
	foreach ($html_string as $value) {
				// print_r($value);
		$title_name=$value->textContent;
	}
	return $title_name;
}

public function getImagesrc($xpath){
	$i=0;
	$html_string = $xpath->query("//div[contains(@id,'image-main')]/ul/li/@data-full-image-href");
	$img_src=array();
	foreach ($html_string as $value) {
				// print_r($value);
		$img_src[$i]=str_replace('il_fullxfull','il_570xN',$value->textContent);
		$i=$i+1;
	}
	return $img_src;
}

public function getDescription($xpath){
	$i=0;
	$description='';
	// $html_string = $xpath->query("//div[contains(@id,'description-text')]/div/div");
	$description='<div>
	HOW TO ORDER :<br>
	1. Select the style and color you want<br>
	2. Click “Add to Cart”<br>
	3. Select size and quantity<br>
	4. Enter shipping and billing information<br>
	5. Done! Simple as that!</p>
	<p>TIP: SHARE it with your friends, buy 2 shirts or more and you will save on shipping</p>
	<p>This a quality 100% cotton t-shirt with a screen printed design. Machine wash cold with like colors, dry low heat Perfect to wear at home or out on the town. Lightweight, Classic fit, Double-needle sleeve and bottom hem. Perfect For Gifts, Or To Purchase For Yourself.</p>
	</div>';
	// foreach ($html_string as $value) {

	// 	if(preg_match('/\'/',$value->textContent)){
	// 		$description[$i]=str_replace("'",'`',$value->textContent);
	// 	}else{
	// 		$description[$i]=$value->textContent;
	// 	}
	// 	$i=$i+1;
	// }
	// print_r($description);
	return $description;
}

public function getVariant($xpath){
	$i=0;
	$html_link_img= $this->getOptionImageLink1($xpath);
	// print_r($html_link_img);public 
	$html_option_value_1=$this->getOptionValue1($xpath);
	// print_r($html_option_value_1);
	// $html_option_value_2=getOptionValue2($xpath);
	// print_r($html_option_value_2);
	$k=0;
	$variant=array();
	for ($i = 0; $i < count($html_link_img); $i++) {
		// print_r($html_link_img[$i]);
		$contentHTML=$this->getHTML($html_link_img[$i]);

		// print_r('<br>');
		// print_r($contentHTML);
		$option_link=$this->getOptionImageLink2($contentHTML);

		// print_r(count($option_link));
		// print_r('<br>');
		// // print_r($option_link);
		// print_r('<br>');
		for($j=0;$j<count($option_link);$j++)
		{
			$link=str_replace("window.location=",'',$option_link[$j]);
			$link=str_replace("'",'', $link);
			$link=str_replace(";",'', $link);
			// print_r($link);
			// print_r('<br>');
			$linkImg='https://checkout.t-shirtat.com/'.$link;
			// print_r($linkImg);
			// print_r('<br>');
			$contentHTMLImg=$this->getHTML($linkImg);
			// print_r($contentHTMLImg);
			// $html_option_value_1=getOptionValue1($contentHTMLImg);
			// print_r($html_option_value_1);
			$html_option_value_2=$this->getOptionValue2($contentHTMLImg);
			// print_r($html_option_value_2);
			// print_r($html_option_value_2);
			$img_src=$this->getImage($contentHTMLImg);
			// print_r($img_src);
			$variant[$k]=[$html_option_value_1[$i]=>[$html_option_value_2[$j]=>$img_src]];
			$k=$k+1;
		}
	}
	return $variant;
}


// get url image
public function getImage($xpath){
	$html_string = $xpath->query("//div[contains(@class,'product-zoom-image')]/img/@src");
	$image_src='';
	foreach ($html_string as $value) {
				// print_r($value);
		$image_src=$value->textContent;
	}
	return $image_src;
}

// get title option 1
public function getOptionTitle1($xpath){
	// $html_string = $xpath->query("//label[contains(@for,'inventory-variation-select-0')]");
	$title_option1='Product';
	// foreach ($html_string as $value) {
	// 			// print_r($value);
	// 	$title_option1=$value->textContent;
	// 				// preg_match('/\d+.\d+/',$value->textContent,$prices);
	// }
	return $title_option1;
}

// get valie option 1
public function getOptionValue1($xpath){
	$i=0;
	$html_string = $xpath->query("//select[contains(@id,'shirtTypes')]/option");
	$value_option1=array();
	foreach ($html_string as $value) {
		$result=preg_replace('/(\$\d+.\d+)/','',$value->textContent);
		$value_option1[$i]=$result;
					// preg_match('/\d+.\d+/',$value->textContent,$prices);
		$i=$i+1;
	}
	return $value_option1;
}


// get image option 1
public function getOptionImageLink1($xpath){
	$html_string = $xpath->query("//select[contains(@id,'shirtTypes')]/option/@value");
	$i=0;
	$image_option1=array();
	foreach ($html_string as $value) {
				// print_r($value);
		$imageLink_option1[$i]='https://checkout.t-shirtat.com'.$value->textContent;
		$i=$i+1;
	}
	return $imageLink_option1;
}

// get title option 2
public function getOptionTitle2($xpath){
 	// $html_string = $xpath->query("//label[contains(@for,'inventory-variation-select-1')]");
	$title_option2='Color';
	// foreach ($html_string as $value) {
	// 			// print_r($value);
	// 	$title_option2=str_replace("'",'`',$value->textContent);
	// 				// preg_match('/\d+.\d+/',$value->textContent,$prices);
	// }
	return $title_option2;
}

// get value option 2
public function getOptionValue2($xpath){
	$i=0;
	$html_string = $xpath->query("//div[contains(@class,'btn-group')]/label/@for");
	$value_option2=array();
	foreach ($html_string as $value) {
				// print_r($value);
		$value_option2[$i]=$value->textContent;
					// preg_match('/\d+.\d+/',$value->textContent,$prices);
		$i=$i+1;
	}
	return $value_option2;
}

// get Link image option 2
public function getOptionImageLink2($xpath){
	$i=0;
	$html_string = $xpath->query("//div[contains(@class,'btn-group')]/label/@onclick");
	$image_option2=array();
	foreach ($html_string as $value) {
				// print_r($value);
		$image_option2[$i]=$value->textContent;
					// preg_match('/\d+.\d+/',$value->textContent,$prices);
		$i=$i+1;
	}
	return $image_option2;
}

// get title option 3
public function getOptionTitle3($xpath){
	// $html_string = $xpath->query("//label[contains(@for,'inventory-variation-select-1')]");
	$title_option3='Size';
	// foreach ($html_string as $value) {
	// 			// print_r($value);
	// 	$title_option2=str_replace("'",'`',$value->textContent);
	// 				// preg_match('/\d+.\d+/',$value->textContent,$prices);
	// }
	return $title_option3;
}

// get Data option 3
public function getOptionValue3($xpath){
	$i=0;
	$html_string = $xpath->query("//select[contains(@id,'sizeChangeId')]/option");
	$value_option3=array();
	foreach ($html_string as $value) {
				// print_r($value);
		$value_option3[$i]=preg_replace('/\+\$\d+/','',$value->textContent);
					// preg_match('/\d+.\d+/',$value->textContent,$prices);
		$i=$i+1;
	}
	return $value_option3;
}

public function writeDB($data){

	tshirt_product::insert(['category'=>$data['category'],
		'url_img'=>$data['image_url'],
		'title'=>$data['title'],
		'prices'=>$data['prices'],
		'url_product'=>$data['url_product'],
		'date_crawled'=>$data['day_crawled'],
		'option_title1'=>$data['option_title1'],
		'option_value1'=>$data['option_value1'],
		'option_title2'=>$data['option_title2'],
		'option_value2'=>$data['option_value2'],
		'option_title3'=>$data['option_title3'],
		'option_value3'=>$data['option_value3'],
		'variant'=>$data['variant'],
		'description'=>$data['description'],
		'is_export'=>false]);
}

public function updateDB($data){

	tshirt_product::where('url_product',$data['url_product'])
	->update(['vendor'=>$data['vendor'],
		'url_img'=>$data['image_url'],
		'title'=>$data['title'],
		'seller_name'=>$data['seller_name'],
		'prices'=>$data['prices'],
		'feedback'=>$data['feedback'],
		'favorited'=>$data['favorited'],
		'url_product'=>$data['url_product'],
		'date_crawled'=>$data['day_crawled'],
		'option_title1'=>$data['option_title1'],
		'option_value1'=>$data['option_value1'],
		'option_title2'=>$data['option_title2'],
		'option_value2'=>$data['option_value2'],
		'description'=>$data['description'],
		'is_export'=>false]);

}

}



?>