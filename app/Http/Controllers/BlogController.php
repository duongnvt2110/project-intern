<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\esty_product;
use App\Classes\search;

class BlogController extends Controller
{
    /**
     * Posts
     *
     * @return void
     */
    public function showPosts()
    {
        $posts = esty_product::paginate(5);

        if (Request()->ajax()){
            return Response::json(View::make('posts', array('posts' => $posts))->render());
        }

        return View()->make('blog', array('posts' => $posts));
    }
}
