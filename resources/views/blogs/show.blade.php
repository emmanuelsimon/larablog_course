@extends('layouts.app')

@include('layouts.partials.meta_dynamiq')

@section('content')

<div class="container-fluid">
    <div class="jumbotron">
        <h1>{{ $blog->title }}</h1>
    </div>
    <div class="col-md-12">
        @if($blog->featured_image)
            <img src="/Lwp/public/images/featured_image/{{ $blog->featured_image ? $blog->featured_image:''}}" alt="{{ str_limit($blog->title, 15) }}" class="img-responsive featured_image">
        @endif
    </div>

    <div class="col-md-12">
        <p>{!!$blog->body !!}</p>
        @if($blog->user)
            Auteur : <a href="{{ route('users.show', $blog->user->name) }}">{{ $blog->user->name }} | Créé le : {{ $blog->created_at->diffForHumans() }}</a>
        @endif<hr>
        <strong>Catégories :</strong>
        @foreach($blog->category as $category)
            <span><a href="{{ route('categories.show', $category->slug) }}">{{ $category->name }}</a></span>
        @endforeach
    </div>
    @if(Auth::user())
        @if(Auth::user()->role_id===1 || Auth::user()->role_id===2 && Auth::user()->id===blog()->user_id)
            <a href="{{ route('blogs.edit', $blog->id) }}">Edition</a>
        @endif
    @endif
</div>


@endsection