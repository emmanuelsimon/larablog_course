@extends('layouts.app')

@include('layouts.partials.meta_static')

@section('content')

<div class="container">
    @if(Session::has('blog_created_message'))
        <div class="alert alert-success">
            {{ Session::get('blog_created_message') }}
            <button close="close" class="button" data-dismiss="alert" aria-hidden="true">x</button>
        </div>
    @endif
    @foreach($blogs as $blog)
        <a href="{{ route('blogs.show', $blog->id) }}">{{ $blog->title }}</a><br />
        {!! $blog->body !!}
        @if($blog->user)
            Auteur : <a href="{{ route('users.show', $blog->user->name) }}">{{ $blog->user->name }} | Créé le : {{ $blog->created_at->diffForHumans() }}</a>
        @endif;
        <hr>
    @endforeach
</div>



@endsection
