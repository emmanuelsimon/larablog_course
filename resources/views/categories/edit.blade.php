@extends('layouts.app');

@section('content')


    <div class="container-fluid">
        <div class="jumbotron">
            <h1>Modification d'une catégorie</h1>
        </div>
        <div class="col-md-12">
            <form action="{{ route('categories.update', $category->id) }}" method="post">
                {{ method_field('patch') }}
                <div class="form-group">
                    <label for="name">Titre</label>
                    <input type="text" name="name" value="{{ $category->name }}">
                </div>
                <button class="btn btn-primary" type="submit">Modification</button>
                {{ csrf_field() }}
            </form>
            <form action="{{ route('categories.destroy', $category->id) }}" method="post">
                {{ method_field('delete') }}
                <button class="btn btn-danger" type="submit">Suppression</button>
                {{ csrf_field() }}
            </form>

        </div>
    </div>


@endsection
