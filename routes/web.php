<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('/', function () {
    return view('welcome');
});
// Route::get('product',[
// 	'as'=>'product',
// 	'uses'=>'AdminController@loadDashBoard'
// ]);
Route::get('admin',[
	'as'=>'admin',
	'uses'=>'AdminController@loginAdmin'
]);
Route::post('load-dashboard',[
	'as'=>'load-dashboard',
	'uses'=>'AdminController@checkAccountAdmin'
]);
Route::get('product',[
	'as'=>'product',	
	'uses'=>'EstyProductController@loadPageProduct'
]);
Route::get('mug-esty',[
	'as'=>'mug-esty',
	'uses'=>'EstyProductController@loadMugEsty'
]);
Route::get('shirt-esty',[
	'as'=>'shirt-esty',
	'uses'=>'EstyProductController@loadShirtEsty'
]);
Route::get('logoutAdmin',[
	'as'=>'logoutAdmin',
	'uses'=>'AdminController@logoutAdmin'
]);
Route::post('search-term',[
	'as'=>'search-term',
	'uses'=>'SearchController@searchTerm'
]);
Route::post('filter-rank',[
	'as'=>'filter-rank',
	'uses'=>'SearchController@filterRank'
]);
Route::get('crawl-gameroom',[
	'as'=>'crawl-gameroom',
	'uses'=>'ControllerCrawl@getDataGameShop'
]);
Route::post('data-gameroom',[
	'as'=>'data-gameroom',
	'uses'=>'ControllerCrawl@crawlData'
]);
Route::post('test',[
	'as'=>'test',
	'uses'=>'CrawlController@test'
]);
Route::get('test',[
	'as'=>'test',
	'uses'=>'DBCrawlController@getbanner'
]);
Route::get('import-db',[
	'as'=>'import-db',
	'uses'=>'DBCrawlController@loadPage'
]);
Route::post('data-import',[
	'as'=>'data-import',
	'uses'=>'DBCrawlController@getDBCrawl'
]);
Route::get('event',[
	'as'=>'event',
	'uses'=>'EventController@eventPage'
]);
Route::get('trademark',[
	'as'=>'trademark',
	'uses'=>'TradeMarkController@trademark'
]);
Route::get('statistics',[
	'as'=>'statistics',
	'uses'=>'StatisticController@statistics'
]);
Route::get('keywords',[
	'as'=>'keywords',
	'uses'=>'StatisticController@keywords'
]);
Route::post('filter-type',[
	'as'=>'filter-type',
	'uses'=>'EstyProductController@filterMugType'
]);
Route::get('export-csv',[
	'as'=>'export-csv',
	'uses'=>'ExportCsvController@exportCsv'
]);
Route::get('load-esty',[
	'as'=>'load-esty',
	'uses'=>'CrawlEstyController@loadPageEsty'
]);
Route::get('crawl-esty',[
	'as'=>'crawl-esty',
	'uses'=>'CrawlEstyController@crawlEsty'
]);
Route::get('tshirtat',[
	'as'=>'tshirtat',
	'uses'=>'TshirtController@loadProductTshirtat'
]);
Route::get('load-tshirt',[
	'as'=>'load-tshirt',
	'uses'=>'CrawlTshirtController@loadPageTshirt'
]);
Route::get('crawl-tshirt',[
	'as'=>'crawl-tshirt',
	'uses'=>'CrawlTshirtController@crawlTshirt'
]);
Route::get('down-image',[
	'as'=>'down-image',
	'uses'=>'TshirtController@loadDownImage'
]);
Route::get('save-image',[
	'as'=>'save-image',
	'uses'=>'TshirtController@downImage'
]);

