@extends('layouts.default')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <h1>SHOW USER PAGE</h1>
        <div class="col-md-8">
            <div>Nome {{$user->name}}</div>
            <div>Mail {{$user->email}}</div>
            <form class="d-flex-inline mx-2" action="{{ route("admin.users.destroy", $user->id) }}" method="post" class="form">
                @csrf
                @method('delete')
                <button class="btn btn-danger" type="submit" onclick="return confirm('Are you sure?')">Delete</button>
            </form>
            <button class="btn btn-secondary mx-2 d-flex-inline"><a href="{{route('admin.users.edit', $user->id)}}">Edit</a></button>
        </div>
    </div>
</div>
@endsection
