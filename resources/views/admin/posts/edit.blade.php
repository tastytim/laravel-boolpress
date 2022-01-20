@extends('layouts.default')


@section('content')
<div class="col-md-8">
<form action="{{ route("admin.posts.update", $post->id) }}" method="post">
    @csrf
    @method('put')

    <div class="mb-3">
        <div>
            <label for="title" class="form-label">Title</label>
            <input type="text" class="form-control" name="title" id="title" value="{{$post->title}}">
        </div>
        <div>
            <label for="body" class="form-label">Testo</label>
            <textarea rows="10" type="text" class="form-control" name="body" id="body" value="{{$post->body}}"> 
            </textarea>
        </div>
        <div>
            <label for="category_id" class="form-label">Category</label>
                <select name="category_id" class="form-control">
                    @foreach($categories as $key)
                         <option value="{{$key->id}}">{{$key->name}}</option>
                    @endforeach
                </select>
            </div>
    </div>
    <div>
        <button class="btn btn-primary" type="submit">Save</button>
    </div>
</form>
</div>

@endsection