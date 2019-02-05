@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="jumbotron">
            <h1>Gestion des utiilisateurs</h1>
        </div>
        <div class="col-md-12">
            <div class="row">
                @foreach($users as $user)
                    <div class="col-md-3">
                        <form action="{{ route('users.update', $user->id) }}" method="post">
                            {{ method_field('patch') }}
                            <div class="form-group">
                                <input class="form-control" value="{{ $user->name }}" disabled>
                            </div>
                            <div class="form-group">
                                <select name="role_id" class="form-control">
                                    <option selected>{{ $user->role->name }}</option>
                                    <option value="1">Admin</option>
                                    <option value="2">Auteur</option>
                                    <option value="3">Invité</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <input class="form-control" value="{{ $user->email }}" disabled>
                            </div>
                            <div class="form-group">
                                <input class="form-control" value="{{ $user->created_at->diffForHumans() }}" disabled>
                            </div>
                            <button type="submit" class="btn btn-primary pull-left col-md-6">Mise à jour</button>
                            {{ csrf_field() }}
                        </form>
                        <form action="{{ route('users.destroy', $user) }}" method="post">
                            {{method_field('delete')}}
                            <button type="submit" class="btn btn-danger pull-left col-md-6">Supprimer</button>
                            {{ csrf_field() }}
                        </form>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

@endsection
