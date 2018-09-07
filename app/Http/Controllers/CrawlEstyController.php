<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Classes\crawl_esty;
class CrawlEstyController extends Controller
{
	public function loadPageEsty(){
		return view('site.crawl_esty');
	}
    public function crawlEsty(Request $req){
    	$crawl=new crawl_esty();
    	$id=$req->get('search');
    	$crawl->getData($id);
    }
}
