@extends('layouts.app');

@section('content')

@include('layouts.partials.tinymce')
<div class="container-fluid">
    <div class="jumbotron">
        <h1>Page de creation d'une entrée blog</h1>
    </div>
    <div class="col-md-12">
        <form action="{{ route('blogs.store') }}" method="post" enctype="multipart/form-data">
            @include('layouts.partials.error-message')
            <div class="form-group">
                <label for="title">Titre</label>
                <input class="form-control" type="text" name="title">
            </div>
            <div class="form-group">
                <label for="body">Contenu</label>
                <textarea class="form-control" type="text" name="body"></textarea>
            </div>
            <div class="form-group form-check form-check-inline">
                @foreach($categories as $category)
                    <input class="form-check-input" type="checkbox" value="{{$category->id}}" name="category_id[]">
                    <label class="form-check-label">{{ $category->name }}</label>
                @endforeach
            </div>
            <div class="form-group">
                <label for="featured_image">Image</label>
                <input class="form-control" type="file" name="featured_image">
            </div>
            <div>
                <button class="btn btn-primary" type="submit">Ajouter une entrée</button>
                {{ csrf_field() }}
            </div>
        </form>
    </div>
</div>


@endsection
