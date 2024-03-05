@extends('layouts.layout')

@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Ajouter un auteur</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('author.index') }}"> Retour</a>
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

<form action="{{ route('author.store') }}" method="POST">
    @csrf

    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>DNI:</strong>
                <input type="text" name="id" class="form-control" placeholder="DNI" maxlenght="32" value="{{ old('id') }}">
                @if($errors->has('name'))
                <span>{{ $errors->first('id') }}</span>
                @endif
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Prénom:</strong>
                    <input type="text" name="name" class="form-control" placeholder="Prénom" value="{{ old('name') }}">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Nom:</strong>
                    <input type="text" name="lastName" class="form-control" placeholder="Nom de famille" value="{{ old('lastName') }}">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Date de naissance:</strong>
                    <input class="form-control" type="date" name="birth" min="1920-01-01" max="2018-12-31" value="{{ old('birth') }}">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Biographie:</strong>
                    <textarea class="form-control" style="height:50px" name="biography" placeholder="Biographie">{{ old('biography') }}</textarea>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Envoyer</button>
            </div>
        </div>

</form>
@endsection