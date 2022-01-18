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
        </div>

        <div>
            <button class="btn btn-success" type="submit">Create</button>
        </div>

    </form>

</div>
@endsection