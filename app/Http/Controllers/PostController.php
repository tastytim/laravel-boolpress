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



    // $postsExampleLists = [
    //      [
    //       'user_id' => 1,
    //       'category_id' => 1,
    //       'id' => 1,
    //       'title' => 'sunt aut facere repellat provident occaecati excepturi optio reprehenderit',
    //       'thumb' => 'sunt aut facere repellat provident occaecati excepturi optio reprehenderit',
    //       'body' => 'quia et suscipit
    //   suscipit recusandae consequuntur expedita et cum
    //   reprehenderit molestiae ut ut quas totam
    //   nostrum rerum est autem sunt rem eveniet architecto',
    //     ],

    // ];

    $postsPublicList = Post::with("category", "user")->get();

    return $postsPublicList;
  }
}
