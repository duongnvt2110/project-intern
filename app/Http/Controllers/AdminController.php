<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Session;
class AdminController extends Controller
{
    public function __construct(User $user){
      $this->user=$user;
    }
    public function loginAdmin(){
    	return view('login');
    }
    public function checkAccountAdmin(Request $req){
    	$userName=$req->post('username');
    	$passWord=$req->post('password');
    	$admin=$this->user->getInfoAdmin();
    	if($userName==$admin['username'] && $passWord==$admin['password']){
    		$req->Session()->put('admin',$admin);
    		return Redirect('product'); 
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
