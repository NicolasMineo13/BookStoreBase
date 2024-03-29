@extends('layouts.layout')

@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Liste des auteurs</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-success" href="{{ route('author.create') }}"> Créer un auteur</a>
        </div>
    </div>
</div>

@if ($message = Session::get('success'))
<div class="alert alert-success">
    <p>{{ $message }}</p>
</div>
@endif

<table class="table table-bordered">
    <tr>
        <th>N°</th>
        <th>DNI</th>
        <th>Prénom</th>
        <th>Nom </th>
        <th width="280px">Actions</th>
    </tr>
    @foreach ($authors as $author)
    <tr>
        <td>{{ ++$i }}</td>
        <td>{{ $author->id }}</td>
        <td>
            {{ $author->name }}
        </td>
        <td>
            {{ $author->lastName }}
        </td>
        <td>
            <a class="btn btn-info" href="{{ route('author.show',$author) }}">Voir</a>
            @if ($author->deleted_at == NULL)
            <a class="btn btn-primary" href="{{ route('author.edit', $author) }}">Modifier</a>

            <form action="{{ route('author.destroy', $author) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Supprimer</button>
            </form>
            @else
            <form action="{{ route('author.restore') }}" method="POST">
                @csrf
                <input type="hidden" name="ISBN" value="{{ $author->ISBN }}">
                <button type="submit" class="btn btn-warning">Restaurer</button>
            </form>
            @endif
        </td>
    </tr>
    @endforeach
</table>

@endsection