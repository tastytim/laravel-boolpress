<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Post;
use Illuminate\Support\Facades\Validator;

class PostController extends Controller
{
    public function index()
    {
        $postList = Post::all();
        return view("admin.posts.home", compact('postList'));
    }




    public function edit(Post $post){
        return view('admin.posts.edit', compact("post"));
    }



    public function update(Request $request, Post $post){
        $data = $request->all();

        Validator::make($data,[
            "title" => "min:4",
        ])->validate();

        $post->update($data);
        return redirect()->route("admin.posts.show", $post->id)->with("msg","Updated post successfully" );
    }




    public function show(Post $post){

        return view('admin.posts.show', compact('post'));
    }



    public function destroy($id){
        $post = Post::findOrFail($id);
        $post->delete();
        return redirect()->route('admin.posts');
    }

    public function store(Request $request)
    {
        $request->validate([
            "title" => "required",
            "body" => "required"
        ]);

        $data = $request->all();
        $post = new Post();
        $post->fill($data);
        $post->save();

        return redirect()->route("admin.posts.index");
    }



    public function create()
    {
        return view('admin.posts.create');
    }

    public function getAll()
    {
        
        return Post::all();
    }
}
