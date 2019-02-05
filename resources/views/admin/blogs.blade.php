@extends('layouts.app')

@include('layouts.partials.meta_static')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-6">
                <h1>Publiés</h1>
                @foreach($blogsPublish as $blog)
                    <a href="{{ route('blogs.show', $blog->id) }}">{{ $blog->title }}</a><br />
                    {!! str_limit($blog->body, 100) !!}<br />
                    <form action="{{ route('blogs.update', $blog->id) }}" method="post">
                        {{ method_field('patch') }}
                            <input type="hidden" value="0" name="status" checked>
                            <button type="submit" class="btn btn-primary">Sauvegarde en brouillon</button>

                        {{ csrf_field() }}
                    </form>

                    <hr>
                @endforeach
            </div>
            <div class="col-md-6">
                <h1>Brouillons</h1>
                @foreach($blogsDraft as $blog)
                    <a href="{{ route('blogs.show', $blog->id) }}">{{ $blog->title }}</a><br />
                    {!! str_limit($blog->body, 100) !!}
                    <br />
                    <form action="{{ route('blogs.update', $blog->id) }}" method="post">
                        {{ method_field('patch') }}
                        <input type="hidden" value="1" name="status">
                        <button type="submit" class="btn btn-danger">Publier</button>


                        {{ csrf_field() }}
                    </form>
                    <hr>
                @endforeach
            </div>
        </div>
    </div>
@endsection
