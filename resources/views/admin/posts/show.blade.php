@extends('layouts.default')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <h1>SHOW POSTS PAGE</h1>
        <div class="container">
        <img class="width-100 heiht-50" src="{{$post->thumb}}">
            <h2> {{$post->title}}</h2>
            <div>{{$post->body}}</div>
            <div>{{$post->category_id}}</div>
            <form class="d-flex-inline mx-2" action="{{ route("admin.posts.destroy", $post->id) }}" method="post" class="form">
                @csrf
                @method('delete')
                <button class="btn btn-danger" type="submit" onclick="return confirm('Are you sure?')">Delete</button>
            </form>
            <button class="btn btn-secondary mx-2 d-flex-inline"><a href="{{route('admin.posts.edit', $post->id)}}">Edit</a></button>
        </div>
    </div>
</div>
@endsection