@extends('layouts.app');

@section('content')
<h1>Page des catégories</h1>
<table>
    @foreach($categories as $category)
        <tr>
            <td>
                {{ $category->name }}
            </td>
            <td>
                {{ $category->slug }}
            </td>
            <td>
                <form>
                    <a class="btn btn-success" href="{{ route('categories.edit', $category->id) }}">Edition</a>
                </form>
            </td>
            <td>
                <form action="{{ route('categories.destroy', $category->id) }}" method="post">
                    {{ method_field('delete') }}
                    <button class="btn btn-danger" type="submit">Suppression</button>
                    {{ csrf_field() }}
                </form>

            </td>
        </tr>
    @endforeach
</table>



@endsection
