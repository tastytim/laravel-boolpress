@extends('layouts.default')


@section('content')
<div class="container">
<form action="{{ route("admin.posts.update", $post->id) }}" method="post">
    @csrf
    @method('patch')

    <div class="mb-3">
        <div>
            <label for="title" class="form-label">Title</label>
            <input type="text" class="form-control @error('title') is-invalid @enderror"               
             name="title" id="title" value="{{$post->title}}">
        </div>
        <div>
            <label for="body" class="form-label">Testo</label>
            <textarea rows="10" type="text" class="form-control 
            @error('body') is-invalid 
            @enderror" name="body" id="body"> 
            {!!$post->body!!}
            </textarea>
        </div>
        <div>
                <label for="thumb" class="form-label">Url img</label>
                <input type="text" class="form-control" name="thumb" id="thumb" value="{{$post->thumb}}">

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
    <div class="d-flex">
            @foreach($tags as $key)
            <div class="mr-2">
                <label>{{$key->name}}</label>
                <input name="tags[]" type="checkbox" value="{{$key->id}}" @if ($post->tags->contains($key))? '' : checked }} @endif>
            </div>
            @endforeach
        </div>
    <div>
        <button class="btn btn-primary" type="submit">Save</button>
    </div>
</form>
</div>
<script src="//js.nicedit.com/nicEdit-latest.js" type="text/javascript">
</script>
<script type="text/javascript">
  bkLib.onDomLoaded(nicEditors.allTextAreas);
</script>
@endsection