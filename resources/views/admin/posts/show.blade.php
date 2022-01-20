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
            <form class="d-flex mx-2" action="{{ route("admin.posts.destroy", $post->id) }}" method="post" class="form">
                @csrf
                @method('delete')

            </form>
            <button class="btn btn-danger" type="submit" onclick="return confirm('Are you sure?')">Delete</button>
            <button class="btn btn-secondary "><a href="{{route('admin.posts.edit', $post->id)}}">Edit</a></button>
        </div>
    </div>
</div>
@endsection
