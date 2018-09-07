<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\esty_product;
use App\Classes\search;
use Session;
class EstyProductController extends Controller
{
    public function __construct(esty_product $estyProduct,search $search)
    {
        $this->estyProduct=$estyProduct;
        $this->search=$search;
    }
    public function loadPageProduct(){
    	// $esty_product=esty_product::paginate(0);
    	return view('site.product');
    }
    public function loadMugEsty(Request $req){
        $search=$req->post('search');
        $vendor='mug';
        $path='mug-esty';
        if($search=='feedback'){

            $estyProduct=$this->estyProduct->getProductEsty($search,$vendor,$path);
            Session::forget('option');
            Session::put('option',$search);
        }else if($search=='favorited'){

            $estyProduct=$this->estyProduct->getProductEsty($search,$vendor,$path);
            Session::forget('option');
            Session::put('option',$search);

        }else{
            $estyProduct=$this->estyProduct->getAllProduct($vendor);
            Session::forget('option');
            Session::put('option','all');
        }
        Session::put('click','esty');
    	return response()->view('site.mug_esty',compact('estyProduct'));
    }
    public function loadShirtEsty(Request $req){
    	
        $search=$req->post('search');
        $vendor='shirt';
        $path='shirt-esty';
        if($search=='feedback'){

            $estyProduct=$this->estyProduct->getProductEsty($search,$vendor,$path);
            Session::forget('option');
            Session(['option'=>$search]);
        }else if($search=='favorited'){

            $estyProduct=$this->estyProduct->getProductEsty($search,$vendor,$path);
            Session::forget('option');
            Session(['option'=>$search]);

        }else{
            $estyProduct=$this->estyProduct->getAllProduct($vendor);
            Session::forget('option');
            Session(['option'=>$search]);
        }
        Session::put('click','esty');
        return response()->view('site.shirt_esty',compact('estyProduct'));
    }
    public function getProductFromDB(){
    	$esty_produc=esty_product::all()->paginate(10);
    }
}
