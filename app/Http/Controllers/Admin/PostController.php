<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Tag;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Post;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

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

        $oldTitle =$post->title;
        $oldImg = $post->thumb;
        $data = $request->all();
        Validator::make($data, [
            "title" => "min:4",
        ])->validate();
        $post->fill($data);
        if ($request->file('thumb')) {
            if ($oldImg) {
                Storage::delete($oldImg);
            }
            $post->thumb = $request->file('thumb')->store('posts');
        }
        if($oldTitle !== $data["title"]){
            $post->slug = $this->createSlug($data['title']);
        }
        $post->save();
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
        $post->slug = $this->createSlug($data['title']);
        $post->fill($data);
        $post->user_id = Auth::user()->id;
        if ($request->file('thumb')) {
            $post->thumb = Storage::put('posts', $data['thumb']);
        }


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

    public function createSlug($title)
    {
        $slug = Str::slug('$title');

        $alreadyExists = Post::where("slug", $slug)->first();
        $counter = 1;

        while ($alreadyExists) {

            $newSlug = $slug . "-" . $counter;
            $alreadyExists = Post::where("slug", $newSlug)->first();
            $counter++;
            if (!$alreadyExists) {
                $slug = $newSlug;
            }
        }
        return $slug;
    }
}
