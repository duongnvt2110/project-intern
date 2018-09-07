<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Classes\crawl_tshirt;

class CrawlTshirtController extends Controller
{
    public function loadPageTshirt(){
		return view('site.crawl_tshirt');
	}
    public function crawlTshirt(Request $req){
    	$crawl=new crawl_tshirt();
    	$id=$req->get('search');
    	$crawl->getData($id);
    }
}
