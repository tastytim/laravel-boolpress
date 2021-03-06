@extends("layouts.default")
@section("content")
<div class="container">
    <form action="{{ route("admin.posts.store") }}" method="post" enctype='multipart/form-data' class="form-group" >
        @csrf
        <div class="mb-3">
            <div>
                <label for="title" class="form-label">Title</label>
                <input type="text" class="form-control" name="title" id="title">
            </div>
            <div>
                <label for="body" class="form-label">Testo</label>
                <textarea rows="10" type="text" class="form-control" name="body" id="body">
            </textarea>
            </div>
            <div class="my-2">
                <label for="thumb" class="form-label">Carica immagine</label>
                <input type="file" class="form-control-file" name="thumb" id="thumb">
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
                <input name="tags[]" type="checkbox" value="{{$key->id}}">
            </div>
            @endforeach
        </div>
        <div>
            <button class="btn btn-success" type="submit">Create</button>
        </div>
    </form>
    <script src="//js.nicedit.com/nicEdit-latest.js" type="text/javascript">
    </script>
    <script type="text/javascript">
        bkLib.onDomLoaded(nicEditors.allTextAreas);

    </script>
</div>
@endsection
