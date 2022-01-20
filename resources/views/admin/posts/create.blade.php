@extends("layouts.default")


@section("content")
<div class="container">

    <form action="{{ route("admin.posts.store") }}" method="post">
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
            <div>
                <label for="thumb" class="form-label">Url img</label>
                <input type="text" class="form-control" name="thumb" id="thumb">

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
