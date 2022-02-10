<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Post;
use App\Visit;

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
    $post = Post::with("user:id,name", "tags", "category")->where("slug", $slug)->first();
    
    $newView = new Visit();
    $newView->post_id = $post->id;
    $newView->views = 1;
    $newView->save();
    return response()->json($post);
  }
}
