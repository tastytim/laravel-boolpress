@extends('layouts.default')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>
                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    <h1></h1>
                    @endif
                    <ul>
                        <li>{{ Auth::user()->name}}</li>
                        <li>{{ Auth::user()->email}}</li>
                        <li><a href="{{route('admin.users.index')}}">Users</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
