@extends('layouts.layout')
  
@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Add New Book</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('books.index') }}"> Back</a>
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
   
<form action="{{ route('books.update',$book->ISBN) }}" method="POST">
    @csrf
  
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Title:</strong>
                <input type="text" name="ISBN" class="form-control" placeholder="Book ISBN" maxlenght="32" 
                       value="{{ $book->ISBN }}" readonly>
            </div>
        </div>
     <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Title:</strong>
                <input type="text" name="title" class="form-control" placeholder="Title" value="{{ $book->title }}">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Year:</strong>
                <input class="form-control" type="number" max="2023" min="700" 
                       name="year" placeholder="Year of edition" value="{{ $book->year }}">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Edition:</strong>
                <input class="form-control" type="number" max="30" min="1" 
                       name="edition" placeholder="Number of edition" value="{{ $book->edition }}">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Editorial:</strong>
                <textarea class="form-control" style="height:50px" name="editorial" placeholder="Editorial">{{ $book->editorial }}</textarea>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Description:</strong>
                <textarea class="form-control" style="height:150px" name="description" placeholder="General description">{{ $book->description }}</textarea>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Dimensions:</strong>
                <textarea class="form-control" style="height:150px" name="dimensions" placeholder="Physical dimensions">{{ $book->dimensions }}</textarea>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Unit price:</strong>
                <input class="form-control" type="float" max="1" min="30" 
                       name="unitPrice" placeholder="Price per unit" value="{{ $book->unitPrice }}">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Author:</strong>
                <select name="author_id" id="author_id" class="form-control">
                    <option value="">Pick an author ...</option>
                @foreach ($authors as $author)
                    @if ($book->author_id == $author->id)
                        <option  class="form-control" value="{{ $author->id }}" selected>{{ $author->name }}</option>
                    @else
                        <option  class="form-control" value="{{ $author->id }}">{{ $author->name }}</option>
                    @endif
                @endforeach
                </select>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </div>
   
</form>
@endsection