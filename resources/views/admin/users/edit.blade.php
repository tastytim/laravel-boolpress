@extends('layouts.default')


@section('content')
<div class="col-md-8">
<form action="{{ route("admin.users.update", $user->id) }}" method="post">
    @csrf
    @method('put')

    <div class="mb-3">
        <div>
            <label for="name" class="form-label">Name</label>
            <input type="text" class="form-control" name="name" id="field_name" value="{{$user->name}}">
        </div>
        <div>
            <label for="email" class="form-label">Email</label>
            <input type="text" class="form-control" name="email" id="email" value="{{$user->mail}}">
        </div>
    </div>
    <div>
        <button class="btn btn-primary" type="submit">Save</button>
    </div>
</form>
</div>

@endsection
