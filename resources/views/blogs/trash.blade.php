@extends('layouts.app');

@section('content')
    <div class="container-fluid">
        <div class="jumbotron">
            <h1>Corbeille</h1>
        </div>
    </div>
    <div class="col-md-12">
        @foreach($strahedBlogs as $blog)
            <h1>{{ $blog->title }}</h1>
            <div class="row">
                <div class="col-md-6">
                    <form method="get" action="{{ route('blogs.restore', $blog->id) }}">
                        <button class="btn btn-success btn-xs pull-left" type="submit">Restaurer</button>
                        {{ csrf_field() }}
                    </form>
                </div>
                <div class="col-md-6">
                    <form action="{{ route('blogs.trashDelete', $blog->id) }}" method="post">
                        {{ method_field('delete') }}
                        <button class="btn btn-danger btn-xs" type="submit">Supprimer</button>
                        {{ csrf_field() }}
                    </form>
                </div>
            </div>
        @endforeach
    </div>

    <form action="" method="post">
        <button class="btn btn-success btn-xs" type="">Tout supprimer</button>
        {{ csrf_field() }}
    </form>


@endsection
