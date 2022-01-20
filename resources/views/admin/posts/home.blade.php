@extends('layouts.default')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="container">
            <button class="btn btn-success"><a href="{{route('admin.posts.create')}}">Create new post</a></button>
            <div>
                @foreach($postList as $post)
                <div class="my-5">
                    <div>
                        <a class="text-break" href="{{route('admin.posts.show', $post->id)}}">{{substr($post->body, 0 , 250)}} </a>
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
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection
