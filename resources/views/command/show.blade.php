@extends('layouts.layout')

@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Informations de la commande</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('command.index') }}"> Retour</a>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Code :</strong>
            <input type="text" name="code" class="form-control" placeholder="Code" maxlenght="32" value="{{ $command->code }}" form="ConfirmForm" readonly>
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Code la commande:</strong>
            <input type="text" name="code" class="form-control" placeholder="Code de la commande" maxlenght="32" value="{{ $command->cart_id }}" form="ConfirmForm" readonly>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Date de la commande:</strong>
                <input type="date" name="date" class="form-control" placeholder="Date de création" value="{{ $command->date }}" form="ConfirmForm" readonly>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Total:</strong>
                <input class="form-control" type="number" min="0" name="total" placeholder="Total" value="{{ $command->total }}" form="ConfirmForm" readonly>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Adresse :</strong>
                <input class="form-control" type="text" maxlenght="100" name="address" placeholder="Adresse de facturation" value="{{ $command->address }}" form="ConfirmForm">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Description :</strong>
                <textarea class="form-control" style="height:100px" name="description" placeholder="Description de la commande" value="{{ $command->description }}" form="ConfirmForm"></textarea>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Code</th>
                            <th scope="col">Quantité</th>
                            <th scope="col">Total des objets</th>
                            <th scope="col">Description</th>
                            <th scope="col">Livre</th>
                            <th scope="col" colspan="2">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($items as $item)
                        <tr>
                            <th scope="row">
                                <input class="form-control" type="text" name="code_{{ $item->code }}" value="{{ $item->code }}" readonly>
                            </th>
                            <td>
                                <input class="form-control" type="number" name="quantity_{{ $item->code }}" min="1" value="{{ $item->quantity }}" form="UpdateForm_{{ $item->code }}">
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
                        <tr>
                            @endforeach
                    </tbody>
                </table>
            </div>
            @endsection