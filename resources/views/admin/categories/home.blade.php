@extends('layouts.default')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="container">
           
            <div>
                @foreach($categories as $category)
                <div class="my-5">
                    {{$category}}
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection