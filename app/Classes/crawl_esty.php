<?php
namespace App\Classes;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Pagination\Paginator;
use App\Classes\mycurl;
use App\product;
use App\esty_product;

class crawl_esty{

	public function getData($k)
	{
		set_time_limit(1800);
		ini_set('memory_limit', '-1');

		// for ($k = 1; $k <6; $k++) {

			$http=new mycurl('');
			$http->unsetCookie();
			// exit;
			$url='https://www.etsy.com/market/mug?page='.$k;
			print_r('<br>');
			print_r($url.PHP_EOL);
			print_r('<br>');
			$html=$http->createCurl($url);
			// print_r($html);
			// exit;
		// $html=file_get_contents($url);
			$dom = new \DomDocument();
			@$dom->loadHTML($html);
			$xpath = new \DOMXpath($dom);
			$url=array();
			$i=0;
			$html_string =  $xpath->query("//a[contains(@class,'listing-link')]/@href");
			foreach ($html_string as $value) {
				$url[$i]=$value->textContent;
				$i=$i+1;
			}
			$i=0;
		// print_r(count($url));
		// exit;
			for($j=0;$j<count($url);$j++)
			{
				print_r($url[$j]);
				print_r('<br>');
				$this->getEstyData($url[$j]);
				print_r(' product '.$j.' success');
				print_r('<br>');
				exit;

			}
		// }
	}
	public function getEstyData($url)
	{		
		set_time_limit(1800);
		$http=new mycurl('');
		$i=0;
		$html=$http->createCurl($url);
		// $html=file_get_contents($url);
		// print_r($html);
		$dom = new \DomDocument();
		@$dom->loadHTML($html);
		$xpath = new \DOMXpath($dom);

		// seller name
		$seller_name=$this->getSellerName($xpath);
		// title name
		$title_name=$this->getTitle($xpath);
		// handle
		$handle=preg_replace('/\W/','-',$title_name);
		// img src
		$img_src=$this->getImagesrc($xpath);
		$img_src_en=json_encode($img_src);

		// getDataReview
		$data_review=$this->getDataReview($xpath);
		// getPrice
		$prices=$this->	getPrice($xpath);
		// getDescription
		$description=$this->getDescription($xpath);
		// getOptionTitle1
		$title_option1=$this->getOptionTitle1($xpath);
		//getOptionValue1
		$value_option1=$this->getOptionValue1($xpath);
		$value_option1_en=json_encode($value_option1);
		// getOptionTitle2
		$title_option2=$this->getOptionTitle2($xpath);
		// getOptionValue2
		$value_option2=$this->getOptionValue2($xpath);
		$value_option2_en=json_encode($value_option2);

		// Date Crawled
		date_default_timezone_set('Asia/Ho_Chi_Minh');
		$today = date("Y-m-d"); 
				// print_r($today);

		$data=['url_product'=>$url,
		'vendor'=>'mug',
		'title'=>$title_name,
		'handle'=>$handle,
		'image_url'=>$img_src_en,
		'day_crawled'=> $today,
		'feedback'=>$data_review[0],
		'favorited'=>$data_review[1],
		'prices' =>$prices[0],
		'seller_name'=>$seller_name,
		'option_title1'=>$title_option1,
		'option_value1'=>$value_option1_en,
		'option_title2'=>$title_option2,
		'option_value2'=>$value_option2_en,
		'description'=>$description	

	];
	print_r('<br>');
	print_r($data);
	print_r('<br>');
	$this->excuteDB($data);
	// $this->writeDB($data);
}

public function excuteDB($data){
	// print_r($data['url_product']);
	$check_valid=esty_product::select('title')->where('title',$data['title'])->get();
	$title='';
	foreach ($check_valid as $value) {
		// print_r($value);
		$title=$value['title'];
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
public function getSellerName($xpath){
	$html_string =  $xpath->query("//span[contains(@itemprop,'title')]");
	$seller_name='';
	foreach ($html_string as $value) {
			// print_r($value);
		$seller_name=$value->textContent;
	}
	return $seller_name;
}

public function getTitle($xpath){
	$html_string =  $xpath->query("//div[contains(@class,'buy-box-toolkit')]/h1");
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

public function getDataReview($xpath){
	$html_string = $xpath->query("//ul[contains(@id,'item-overview')]/li");
	$data_review=array();
	foreach ($html_string as $value) {
		if (preg_match('/Feedback\:/',$value->textContent)) {
			preg_match('/\d+/',$value->textContent,$feedback);
			$data_review[0]=$feedback[0];
		}
		if(preg_match('/Favorited\sby/',$value->textContent))
		{
			preg_match('/\d+/',$value->textContent,$favorited);
			$data_review[1]=$favorited[0];
		}
	}
	if(!isset($data_review[0])){
		$data_review[0]=0;
	}
	if(!isset($data_review[1])){
		$data_review[1]=0;
	}
	return $data_review;
}

public function getPrice($xpath){
	$html_string = $xpath->query("//span[contains(@class,'override-listing-price')]");
				// $prices=array();
	foreach ($html_string as $value) {
				// print_r($value);
		preg_match('/\d+.\d+/',$value->textContent,$prices);
	}
	if(!isset($prices)){
		$prices[0]=0;
	}
	return $prices;
}

public function getDescription($xpath){
	$i=0;
	$html_string = $xpath->query("//div[contains(@id,'description-text')]/div/div");
	$description=array();
	foreach ($html_string as $value) {
				// print_r($value);
		$description[$i]=str_replace("'",'`',$value->textContent);
					// preg_match('/\d+.\d+/',$value->textContent,$prices);
		$i=$i+1;
	}
	if(!isset($description[0])){
		$description[0]=0;
	}
	return $description[0];
}

public function getOptionTitle1($xpath){
	$html_string = $xpath->query("//label[contains(@for,'inventory-variation-select-0')]");
	$title_option1='';
	foreach ($html_string as $value) {
				// print_r($value);
		$title_option1=$value->textContent;
					// preg_match('/\d+.\d+/',$value->textContent,$prices);
	}
	return $title_option1;
}

public function getOptionValue1($xpath){
	$i=0;
	$html_string = $xpath->query("//select[contains(@id,'inventory-variation-select-0')]/option");
	$value_option1=array();
	foreach ($html_string as $value) {
				// print_r($value);
		$value_option1[$i]=str_replace("'",'`',$value->textContent);
					// preg_match('/\d+.\d+/',$value->textContent,$prices);
		$i=$i+1;
	}
	return $value_option1;
}

public function getOptionTitle2($xpath){
	$html_string = $xpath->query("//label[contains(@for,'inventory-variation-select-1')]");
	$title_option2='';
	foreach ($html_string as $value) {
				// print_r($value);
		$title_option2=str_replace("'",'`',$value->textContent);
					// preg_match('/\d+.\d+/',$value->textContent,$prices);
	}
	return $title_option2;
}

public function getOptionValue2($xpath){
	$i=0;
	$html_string = $xpath->query("//select[contains(@id,'inventory-variation-select-1')]/option");
	$value_option2=array();
	foreach ($html_string as $value) {
				// print_r($value);
		$value_option2[$i]=$value->textContent;
					// preg_match('/\d+.\d+/',$value->textContent,$prices);
		$i=$i+1;
	}
	return $value_option2;
}
public function writeDB($data){

	esty_product::insert(['vendor'=>$data['vendor'],
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
public function updateDB($data){

	esty_product::where('title',$data['title'])
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
public function getValue($data)
{
	$result_value=array();
	$i=0;
	foreach ($data as $value) {
		$result_value[$i]=$value->textContent;
		$i=$i+1;
	}
}
}

?>