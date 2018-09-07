<?php
	namespace App\Classes;
	// namespace App\Classes\Controllers;

	use Illuminate\Http\Request;
	use Illuminate\Pagination\LengthAwarePaginator;
	use Illuminate\Pagination\Paginator;
	use App\product;
	use App\esty_product;
	class search{

		public function searchTerm($data)
		{
		$product_html='';
	      $data_product=esty_product::where('title','like','%'.$data.'%')
	      ->orwhere('seller_name','like','%'.$data.'%')->get();
				foreach ($data_product as $value) {;
				$product_html .='
	              <div class="items-list col-sm-3 col-md-3 col-xs-12">
			            <div class="cover">
			            <div class="top">
			              <div class="buttonfarvorite">
			                <i class="far fa-heart"></i>
			                <span>Lưu</span>
			              </div>
			              <div class="thumbail">
			                <a id="myBtn">
			                  <img class="img-responsive" style="width: 250px;height: 250px;" src='.$value['url_img'].'>
			                </a>
			              </div>
			              <div class="price">
			                <span>$ '.$value['prices'].'</span>
			              </div>
			            </div>
			            <div class="bottom">
			                <div class="name-tag">
			                <a class="feedback">FeedBack: '.$value['feedback'].' reviews</a>
			              </div>
			               <div class="name-tag">
			                <a class="favorited">Favorited by: '.$value['favorited'].' people</a>
			              </div>
			              <div class="name-tag">
			                <a class="Name">'.$value['title'].'</a>
			              </div>
			              <div class="asin name-tag">
			                <span class="title">Seller Name: </span>
			                <span class="value">
			                  <span>'.$value['seller_name'].'</span>
			                </span>
			              </div>
			              <div class="updated name-tag">
			                <span class="update">Data Crawled: '.$value['date_crawled'].'</span>
			              </div>
			            </div>
			          </div>
			          </div>';
			
			}
	        return $product_html;
		}

		public function filterRank($to=1,$from=1)
		{
		$product_html='';
	      $data_product=product::whereBetween('rank', [$to,$from])->get();
	     
				foreach ($data_product as $value) {;	
				$product_html .='
	                <li class="col-sm-2">
	                    <div class="top">
	                        <div class="buttonfarvorite">
	                            <i class="far fa-heart"></i>
	                            <span>Lưu</span>
	                        </div>
	                        <div class="thumbail">
	                            <a id="myBtn">
	                                <img class="img-responsive" src="'.$value['url_img'].'">
	                            </a>
	                        </div>
	                        <div class="price">
	                            <span>$13.3</span>
	                        </div>
	                    </div>
	                    <div class="bottom">
	                        <div class="rank name-tag">
	                            <div class="btn-arrow">  	
	                                <span><i class="fas fa-arrow-right"></i></span>
	                            </div>
	                            <span class="rank-current">'.$value['rank'].'</span>
	                            <div class="rate">
	                                <span class="before">
	                                    +1,1
	                                </span>
	                            </div>
	                        </div>
	                        <div class="name-tag">
	                            <a class="Name">'.$value['name'].'</a>
	                        </div>
	                        <div class="asin name-tag">
	                            <span class="title">ASIN:</span>
	                            <span class="value">
	                                <span>'.$value['asin'].'</span>
	                                <a ><i class="fa fa-amazon"></i></a>
	                            </span>
	                        </div>
	                        <div class="updated name-tag">
	                            <span class="upadate">7 ngày trước</span>
	                        </div>
	                    </div>
	                </li>';
			
			}
	        return $product_html;
		}
	}

?>