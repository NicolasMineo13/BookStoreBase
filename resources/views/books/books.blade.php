@extends('layouts.layout')
 
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>List of all the books</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('books.create') }}"> Create New book</a>
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
            <th>Title</th>
            <th>Author</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($books as $book)
        <tr>
            <td>{{ ++$i }}</td>
            <td>{{ $book->title }}</td>
            <td>{{ $book->author->name }} {{ $book->author->lastName }}</td>
            <td>
                @if ($book->deleted_at == NULL)
                    <a class="btn btn-info" href="{{ route('books.show',$book) }}">Show</a>
    
                    <a class="btn btn-primary" href="{{ route('books.edit',$book) }}">Edit</a>

                    
                    
                    <form action="{{ route('books.destroy', $book) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                @else
                    <form action="{{ route('books.restore') }}" method="POST">
                        @csrf
                        <input type="hidden" name="ISBN" value="{{ $book->ISBN }}" > 
                        <button type="submit" class="btn btn-warning">Recover</button>
                    </form>   
                @endif
            </td>
        </tr>
        @endforeach
    </table>
      
@endsection