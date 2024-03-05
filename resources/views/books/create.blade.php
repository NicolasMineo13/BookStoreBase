@extends('layouts.layout')

@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Ajouter un livre</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('books.index') }}"> Retour</a>
        </div>
    </div>
</div>

@if ($errors->any())
<div class="alert alert-danger">
    <strong>Whoops!</strong> Il y a des problèmes avec l'input.<br><br>
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

<form action="{{ route('books.store') }}" method="POST">
    @csrf

    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>ISBN:</strong>
                <input type="text" name="ISBN" class="form-control" placeholder="ISBN du livre" maxlenght="32">
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Titre:</strong>
                    <input type="text" name="title" class="form-control" placeholder="Titre du livre">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Année:</strong>
                    <input class="form-control" type="number" max="2023" min="700" name="year" placeholder="Année de parution">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Édition:</strong>
                    <input class="form-control" type="number" max="30" min="1" name="edition" placeholder="Numéro de l'édition">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Éditorial:</strong>
                    <textarea class="form-control" style="height:50px" name="editorial" placeholder="Éditorial"></textarea>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Description:</strong>
                    <textarea class="form-control" style="height:150px" name="description" placeholder="Description générale"></textarea>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Dimensions:</strong>
                    <textarea class="form-control" style="height:150px" name="dimensions" placeholder="Dimensions physiques"></textarea>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Prix unitaire:</strong>
                    <input class="form-control" type="float" max="1" min="30" name="unitPrice" placeholder="Prix unitaire">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Auteur:</strong>
                    <select name="author_id" id="author_id" class="form-control">
                        <option value="">Choisir un auteur ...</option>
                        @foreach ($authors as $author)
                        <option class="form-control" value="{{ $author->id }}">{{ $author->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Envoyer</button>
            </div>
        </div>

</form>
@endsection