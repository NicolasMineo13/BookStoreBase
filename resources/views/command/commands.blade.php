@extends('layouts.layout')
 
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>List of all commands</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('books.index') }}">Look for a book</a>
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
            <th>No</th>
            <th>Date</th>
            <th>Total</th>
            <th>User</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($commands as $command)
        <tr>
            <td>{{ ++$i }}</td>
            <td>{{ $command->date }}</td>
            <td>{{ $command->total }}</td>
            <td>{{ $command->user->name }} {{ $command->user->lasName }}</td>
            <td>
                @if ($command->deleted_at == NULL)
                    <a class="btn btn-info" href="{{ route('command.show', $command) }}">Show</a>                    
                    
                    <form action="" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                @else
                    <form action="" method="POST">
                        @csrf
                        <input type="hidden" name="code" value="{{ $command->code }}" > 
                        <button type="submit" class="btn btn-warning">Recover</button>
                    </form>   
                @endif
            </td>
        </tr>
        @endforeach
    </table>
      
@endsection