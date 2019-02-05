@extends('layouts.app')

@section('content')

    <div class="container-fluid">
        <div class="jumbotron">
            <h3>{{ $user->name }}</a>
            </h3>
            <hr>
        </div>
        <div class="col-md-12">
            @foreach($user->blogs as $blog)
                <h4><a href="{{ route('blogs.show', $blog->id) }}">{{ $blog->title }}</a> </h4>

            @endforeach
        </div>
        <a href="{{ route('blogs.edit', $blog->id) }}">Edition</a>
    </div>


@endsection