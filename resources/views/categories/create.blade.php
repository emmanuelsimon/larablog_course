@extends('layouts.app');

@section('content')


    <div class="container-fluid">
        <div class="jumbotron">
            <h1>Création d'une nouvelle catérgorie</h1>
        </div>
        <div class="col-md-12">
            <form action="{{ route('categories.store') }}" method="post">
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" name="name">
                </div>
                <button class="btn btn-primary" type="submit">Ajouter une entrée</button>
                {{ csrf_field() }}
            </form>
        </div>
    </div>


@endsection
