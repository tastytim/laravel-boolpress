@extends('layouts.default')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <h1>SHOW POSTS PAGE</h1>
        <div class="container">
            <img class="width-100 heiht-50" src="{{$post->thumb}}">
            <div>Titolo</div>
            <h2>{{$post->title}}</h2>
            <div>Testo</div>
            <h2 class="text-break">{{$post->body}}</h2>
            <div>Categoria</div>
            <h3>{{$post->category->name}}</h3>
            <div class="d-flex">
                @foreach($post->tags as $key)
                <div class="mr-2">
                    <label class="badge bg-dark text-white">{{$key->name}}</label>
                </div>
                @endforeach
            </div>

            <div class="d-flex">
                <form for="delete" class="d-flex " action="{{ route("admin.posts.destroy", $post->id) }}" method="post" class="form">
                    @csrf
                    @method('delete')
                    <button class="btn btn-danger" type="submit" onclick="return confirm('Are you sure?')">Delete</button>
                </form>
                <button class="btn btn-secondary ml-2"><a href="{{route('admin.posts.edit', $post->id)}}">Edit</a></button>
            </div>
        </div>
    </div>
</div>
@endsection
