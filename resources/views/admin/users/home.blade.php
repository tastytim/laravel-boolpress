@extends('layouts.default')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <ul>
                @foreach($userList as $user)
                <li class="d-flex my-3">

                    <a href="{{route('admin.users.show', $user->id)}}">{{$user->name}} {{$user->email}}</a>
                    <form class="d-flex mx-2" action="{{ route("admin.users.destroy", $user->id) }}" method="post" class="form">
                        @csrf
                        @method('delete')

                        <button class="btn btn-danger" type="submit" onclick="return confirm('Are you sure?')">Delete</button>

                    </form>
                    <button class="btn btn-secondary mx-2"><a href="{{route('admin.users.edit', $user->id)}}">Edit</a></button>

                </li>



                @endforeach
            </ul>
        </div>
    </div>
</div>
@endsection
