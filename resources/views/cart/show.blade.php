@extends('layouts.layout')
  
@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Shopping cart</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('books.index') }}"> Back</a>
        </div>
    </div>
</div>
     
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Code:</strong>
                <input type="text" name="code" class="form-control" placeholder="Code" maxlenght="32" 
                       value="{{ $cart->code }}" readonly>
            </div>
        </div>
     <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Title:</strong>
                <input type="date" name="date" class="form-control" placeholder="Date de création" value="{{ $cart->date }}" readonly>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Total:</strong>
                <input class="form-control" type="number" min="0" 
                       name="total" placeholder="Total" value="{{ $cart->total }}" readonly>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Code</th>
                        <th scope="col">Quantity</th>
                        <th scope="col">Total Item</th>
                        <th scope="col">Description</th>
                        <th scope="col">Book</th>
                    </tr>
                </thead>
                <tbody>
            @foreach ($items as $item)
                    <tr>
                        <th scope="row">
                            <input class="form-control" type="text" name="code" value="{{ $item->code }}" readonly>
                        </th>
                        <td>
                            <input class="form-control" type="number" name="quantity" min="1" value="{{ $item->quantity }}" readonly>
                        </td>
                        <td>
                            <input class="form-control" type="number" name="total" min="1" value="{{ $item->total }}" readonly>
                        </td>
                        <td>
                            <input class="form-control" type="text" name="description" value="{{ $item->description }}" readonly>
                        </td>
                        <td>
                            <input class="form-control" type="text" name="book_id" value="{{ $item->book_id }}" readonly>
                        </td>
                    <tr>
            @endforeach
                </tbody>    
            </table>
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
            <a class="btn btn-primary" href="{{ route('cart.edit',$cart) }}">Edit</a>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
            <a class="btn btn-primary" href="{{ route('command.create', $cart) }}">Command</a>
        </div>
    </div>
   
@endsection