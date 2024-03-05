@extends('layouts.layout')

@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Voir un livre</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('books.index') }}"> Retour</a>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>ISBN:</strong>
            <input type="text" name="ISBN" class="form-control" placeholder="ISBN du livre" maxlenght="32" value="{{ $book->ISBN }}" readonly>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Titre:</strong>
                <input type="text" name="title" class="form-control" placeholder="Titre du livre" value="{{ $book->title }}" readonly>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Année:</strong>
                <input class="form-control" type="number" max="2023" min="700" name="year" placeholder="Année de parution" value="{{ $book->year }}" readonly>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Édition:</strong>
                <input class="form-control" type="number" max="30" min="1" name="edition" placeholder="Numéro de l'édition" value="{{ $book->edition }}" readonly>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Éditorial:</strong>
                <textarea class="form-control" style="height:50px" name="editorial" placeholder="Éditorial" readonly>{{ $book->editorial }}</textarea>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Description:</strong>
                <textarea class="form-control" style="height:150px" name="description" placeholder="Description générale" readonly>{{ $book->description }}</textarea>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Dimensions:</strong>
                <textarea class="form-control" style="height:150px" name="dimensions" placeholder="Dimensions physiques" readonly>{{ $book->dimensions }}</textarea>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Prix unitaire:</strong>
                <input class="form-control" type="float" max="1" min="30" name="unitPrice" placeholder="Prix unitaire" value="{{ $book->unitPrice }}" readonly>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Auteur:</strong>
                <select name="author_id" id="author_id" class="form-control" readonly>
                    <option value="">Choisir un auteur ...</option>
                    @foreach ($authors as $author)
                    @if ($book->author_id == $author->id)
                    <option class="form-control" value="{{ $author->id }}" selected>{{ $author->name }}</option>
                    @else
                    <option class="form-control" value="{{ $author->id }}">{{ $author->name }}</option>
                    @endif
                    @endforeach
                </select>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
            <a class="btn btn-primary" href="{{ route('books.edit',$book) }}">Modifier</a>
            <a class="btn btn-success" href="{{ route('cart.addItem',$book->ISBN) }}">Ajouter au panier</a>

        </div>
    </div>
    @endsection