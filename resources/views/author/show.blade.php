@extends('layouts.layout')
  
@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Consulte d'auteur</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('author.index') }}"> Back</a>
        </div>
    </div>
</div>
   
@if ($errors->any())
    <div class="alert alert-danger">
        <strong>Whoops!</strong> There were some problems with your input.<br><br>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
   
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>DNI:</strong>
                <input type="text" name="id" class="form-control" placeholder="Id" maxlenght="32"
                        value="{{ $author->id }}" readonly>
            </div>
        </div>
     <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Name:</strong>
                <input type="text" name="name" class="form-control" placeholder="Name"
                        value="{{ $author->name }}" readonly>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Last name:</strong>
                <input type="text" name="lastName" class="form-control" placeholder="Last name"
                        value="{{ $author->lastName }}" readonly>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Birth date:</strong>
                <input class="form-control" type="date" name="birth" 
                       min="1920-01-01" max="2018-12-31" value="{{ $author->birth }}" readonly>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Biography:</strong>
                <textarea class="form-control" style="height:50px" name="biography" placeholder="Biography" readonly>{{ $author->biography }}</textarea>
            </div>
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12 text-center">
            <a class="btn btn-primary" href="{{ route('author.edit',$author) }}">Editer</a>
    </div>
@endsection