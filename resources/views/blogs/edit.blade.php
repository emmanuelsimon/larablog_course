@extends('layouts.app');

@section('content')


    <div class="container-fluid">
        <div class="jumbotron">
            <h1>Modification d'une entrée</h1>
        </div>
        <div class="col-md-12">
            <form action="{{ route('blogs.update', $blog->id) }}" method="post">
                {{ method_field('patch') }}
                <div class="form-group">
                    <label for="title">Titre</label>
                    <input type="text" name="title" value="{{ $blog->title }}">
                </div>
                <div class="form-group">
                    <label for="body">Contenu</label>
                    <textarea type="text" name="body">{{ $blog->body }}</textarea>
                </div>
                <div class="form-group form-check form-check-inline">
                    @foreach($blog->category as $category)
                        <input class="form-check-input" checked type="checkbox" value="{{$category->id}}" name="category_id[]">
                        <label class="form-check-label">{{ $category->name }}</label>
                    @endforeach
                    @foreach($filtre as $category)
                        <input class="form-check-input" type="checkbox" value="{{$category->id}}" name="category_id[]">
                        <label class="form-check-label">{{ $category->name }}</label>
                    @endforeach
                </div>
                <div>
                    <button class="btn btn-primary" type="submit">Editer une entrée</button>
                </div>
                {{ csrf_field() }}
            </form>
            <form action="{{ route('blogs.delete', $blog->id) }}" method="post">
                {{ method_field('delete') }}
                <button class="btn btn-danger btn-xs pull-left" type="submit">Suppression</button>
                {{ csrf_field() }}
            </form>

        </div>
    </div>


@endsection
