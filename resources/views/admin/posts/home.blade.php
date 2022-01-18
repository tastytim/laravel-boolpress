@extends('layouts.default')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="container">
            <button class="btn btn-success"><a href="{{route('admin.posts.create')}}">Create new post</a></button>
            <ul>
                @foreach($postList as $post)
                <li class="d-flex my-3">

                    <a href="{{route('admin.posts.show', $post->id)}}">{{$post->body}} </a>
                    <form class="d-flex mx-2" action="{{ route("admin.posts.destroy", $post->id) }}" method="post" class="form">
                        @csrf
                        @method('delete')

                        <button class="btn btn-danger" type="submit" onclick="return confirm('Are you sure?')">Delete</button>

                    </form>
                    <button class="btn btn-secondary mx-2"><a href="{{route('admin.posts.edit', $post->id)}}">Edit</a></button>

                </li>



                @endforeach
            </ul>
        </div>
    </div>
</div>
@endsection
