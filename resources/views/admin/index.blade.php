@extends('layouts.app');

@section('content')
    <div class="container-fluid">
        <div class="jumbotron">
            @if(Auth::user() && Auth::user()->role_id===1)
                <h1>Admin Dashboard</h1>
            @elseif(Auth::user() && Auth::user()->role_id===2)
                <h1>Auteur Dashboard</h1>
            @elseif(Auth::user() && Auth::user()->role_id===3)
                <h1>Invité Dashboard</h1>
            @endif()

        </div>
        <div class="col-md-12">
            @if(Auth::user() && Auth::user()->role_id === 1)
                <a href="{{ route('admin.blogs') }}" class="btn btn-primary">Administrer les blogs</a>
                <a href="{{ route('blogs.create') }}" class="btn btn-primary text-white">Ajouter un blog</a>
                <a href="{{ route('blogs.trash') }}" class="btn btn-danger">Corbeille</a>
                <a href="{{ route('categories.create') }}" class="btn btn-primary text-white">Ajouter une catérogie</a>
                <a href="{{ route('users.index') }}" class="btn btn-primary text-white">Gestion des utilisateurs</a>
            @endif()
            @if(Auth::user() && Auth::user()->role_id === 2)
                <a href="{{ route('blogs.create') }}" class="btn btn-primary text-white">Ajouter un blog</a>
                <a href="{{ route('categories.create') }}" class="btn btn-primary text-white">Ajouter une catérogie</a>
            @endif()
            @if(Auth::user() && Auth::user()->role_id === 3)
                <a href="#" class="btn btn-primary text-white">What else</a>
            @endif()

        </div>
    </div>

@endsection
