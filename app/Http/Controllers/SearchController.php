<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\product;
use App\Classes\search;
class SearchController extends Controller
{
  public function searchTerm(Request $req)
  {
    $keyword=$req->post('search');
    $search=new search();
    $data_search=$search->searchTerm($keyword);  
    echo $data_search;
  }
  public function filterRank(Request $req)
  {
    $prices_to=$req->post('to');
    $prices_from=$req->post('from'); 
    $search=new search();
    $data_search=$search->filterRank($prices_to,$prices_from);
    echo $data_search;
  }
  
}
