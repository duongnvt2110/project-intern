<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Session;
class ControllerAdmin extends Controller
{
   
    public function loginAdmin(){
    	return view('login');
    }
    public function checkAccountAdmin(Request $req){
    	$username=$req->post('username');
    	$password=$req->post('password');
    	$admin=User::select('username','password')->first();
    	if($username==$admin['username'] && $password==$admin['password']){
    		$req->Session()->put('admin',$admin);
    		return view('site.product'); 
   		}else{
   			$error_login='Username or Password Not Correct!';
   			$req->Session()->put('error',$error_login);
   			return redirect('admin');
   		}
   	}
   	 public function logoutAdmin(){
    	Session::forget('error');
    	Session::forget('admin');
    	return redirect('admin');
   	}
    public function searchTerm(Request $req)
    {
      $output='';
      $keyword=$req->post('search');
      $array=['1','2','3'];
      echo $array;
   }
}
