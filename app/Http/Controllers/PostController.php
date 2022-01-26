<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Admin\PostController as AdminPostController;
use Illuminate\Http\Request;
use App\Post;
use Illuminate\Support\Facades\Validator;

class PostController extends Controller
{
  public function index()
  {
    $postsPublicList = Post::with("category", "user","tags")->get();

    foreach($postsPublicList as $post){
      $post['body']= strlen($post->body) > 190 ? substr($post->body , 0 , 190) : $post->body;
    }

    return $postsPublicList;
  }
}
