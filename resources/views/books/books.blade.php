@extends('layouts.layout')

@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Liste des livres</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-success" href="{{ route('books.create') }}"> Créer un livre</a>
        </div>
        <div class="pull-right">
            <form action="{{ route('books.search') }}" method="GET">
                <input type="text" name="search" placeholder="Rechercher un livre">
                <button type="submit" class="btn btn-primary">Rechercher</button>
            </form>
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
        <th>Titre</th>
        <th>Auteur</th>
        <th width="280px">Actions</th>
    </tr>
    @foreach ($books as $book)
    <tr>
        <td>{{ ++$i }}</td>
        <td>{{ $book->title }}</td>
        <td>{{ $book->author->name }} {{ $book->author->lastName }}</td>
        <td>
            @if ($book->deleted_at == NULL)
            <a class="btn btn-info" href="{{ route('books.show',$book) }}">Voir</a>

            <a class="btn btn-primary" href="{{ route('books.edit',$book) }}">Modifier</a>



            <form action="{{ route('books.destroy', $book) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Supprimer</button>
            </form>
            @else
            <form action="{{ route('books.restore') }}" method="POST">
                @csrf
                <input type="hidden" name="ISBN" value="{{ $book->ISBN }}">
                <button type="submit" class="btn btn-warning">Restaurer</button>
            </form>
            @endif
        </td>
    </tr>
    @endforeach
</table>

@endsection