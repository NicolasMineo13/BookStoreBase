@extends('layouts.layout')
  
@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Command information</h2>
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
   
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Code du cart:</strong>
                <input type="text" name="code" class="form-control" placeholder="Code" maxlenght="32" 
                       value="{{ $cart->code }}" form="ConfirmForm" readonly>
            </div>
        </div>
     <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Date de création du cart:</strong>
                <input type="date" name="date" class="form-control" placeholder="Date de création" value="{{ $cart->date }}" form="ConfirmForm" readonly>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Total:</strong>
                <input class="form-control" type="number" min="0" 
                       name="total" placeholder="Total" value="{{ $cart->total }}" form="ConfirmForm" readonly>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Address :</strong>
                <input class="form-control" type="text" maxlenght="100" 
                       name="address" placeholder="Facturation Address" form="ConfirmForm">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Description :</strong>
                <textarea class="form-control" style="height:100px" name="description" placeholder="Command's description" form="ConfirmForm"></textarea>
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
                        <th scope="col" colspan="2" >Actions</th>
                    </tr>
                </thead>
                <tbody>
            @foreach ($items as $item)
                    <tr>
                        <th scope="row">
                            <input class="form-control" type="text" name="code_{{ $item->code }}" value="{{ $item->code }}" readonly>
                        </th>
                        <td>
                            <input class="form-control" type="number" name="quantity_{{ $item->code }}" min="1" value="{{ $item->quantity }}" form="UpdateForm_{{ $item->code }}" >
                        </td>
                        <td>
                            <input class="form-control" type="number" name="total_{{ $item->code }}" min="1" value="{{ $item->total }}" readonly>
                        </td>
                        <td>
                            <input class="form-control" type="text" name="description_{{ $item->code }}" value="{{ $item->description }}" form="UpdateForm_{{ $item->code }}">
                        </td>
                        <td>
                            <input class="form-control" type="text" name="book_id_{{ $item->code }}" value="{{ $item->book_id }}" readonly>
                        </td>
                        <td>
                            <form action="{{ route('item.destroy', ['item' => $item, 'cart' => $cart]) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                        <td>
                            <form action="{{ route('item.update', ['item' => $item, 'cart' => $cart]) }}" method="POST" id="UpdateForm_{{ $item->code }}">
                                @csrf
                                <button type="submit" class="btn btn-warning">Update</button>
                            </form>
                        </td>
                    <tr>
            @endforeach
                </tbody>    
            </table>
            <form action="{{ route('command.store', $cart) }}" method="POST" id="ConfirmForm">
                @csrf
                <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                    <button type="submit" class="btn btn-primary">Confirm command</button>
                </div>
            </form>   
    </div>
@endsection