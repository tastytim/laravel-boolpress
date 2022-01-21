<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Tag;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Post;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class PostController extends Controller
{
    public function index()
    {
        $postList = Post::where("user_id", Auth::user()->id)->get();
        return view("admin.posts.home", compact('postList'));
    }


    public function edit(Post $post)
    {
        $categories = Category::all();
        $tags = Tag::all();
        return view('admin.posts.edit', [
            'post' => $post,
            'categories' => $categories,
            'tags' => $tags
        ]);
    }



    public function update(Request $request, Post $post)
    {
        $data = $request->all();
        Validator::make($data, [
            "title" => "min:4",
        ])->validate();
        $post->update($data);
        $post->tags()->sync($data["tags"]);
        return redirect()->route("admin.posts.show", $post->id)->with("msg", "Updated post successfully");
    }


    public function show(Post $post)
    {
        return view('admin.posts.show', compact('post'));
    }



    public function destroy($id)
    {
        $post = Post::findOrFail($id);
        $post->tags()->detach();
        $post->delete();
        return redirect()->route('admin.posts.index');
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
        $post->user_id = Auth::user()->id;
        $post->save();
        $post->tags()->sync($data["tags"]);
        return redirect()->route("admin.posts.index");
    }



    public function create()
    {
        $categories = Category::all();
        $tags = Tag::all();
        return view('admin.posts.create', compact('categories', 'tags'));
        // return view('admin.posts.create', [
        //     "categories"=>$categories,
        //     "tags"=>$tags
        // ]);
    }
}
