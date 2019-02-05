@extends('layouts.app');

@section('content')
<h1>{{ $category->name }}</h1>
 <div class="col-md-12">
    @foreach($category->blog as $blog)
        <p><a href="{{ route('blogs.show', $blog->id) }}">{{ $blog->title }}</a> </p>
    @endforeach
 </div>
@endsection
