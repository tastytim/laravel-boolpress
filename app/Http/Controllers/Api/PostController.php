<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Post;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      
      
        $postsList = Post::orderBy('created_at', 'desc')->with("category")
            ->with("user:id,name")
            ->with("tags")->paginate(3);
            
        return response()->json($postsList);
    }

    public function show($slug)
  {
    $post = Post::with("user:id,name","tags","category")->where("slug", $slug)->first();

    return response()->json($post);
  }
}
