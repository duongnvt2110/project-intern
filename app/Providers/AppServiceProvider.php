<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Session;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer(['login','admin'],function($view){
            if(Session('admin')){
                $view->with(['admin'=>Session::get('admin')]);
            }
        });
        view()->composer(['product','mug-esty','shirt-esty'],function($view){
            if(Session('option')){
                $view->with(['product'=>Session::get('option'),'mug-esty'=>Session::get('option'),'shirt-esty'=>Session::get('option')]);
            }
        });
         view()->composer(['tshirtat','mug-esty','shirt-esty'],function($view){
            if(Session('click')){
                $view->with(['tshirtat'=>Session::get('click'),'mug-esty'=>Session::get('click'),'shirt-esty'=>Session::get('click')]);
            }
        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
