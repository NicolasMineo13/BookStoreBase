<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Author;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $books = Book::withTrashed()->get();
        return view("books.books", compact('books'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $authors = Author::all();
        return view('books.create', ["authors" => $authors]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Book $book)
    {
        $this->validation($request, $book);

        Book::create($request->all());

        return redirect()->route('books.index')
            ->with('success', 'Book created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request, Book $book)
    {
        /*
        $authors = DB::connection('storage')
            ->select("SELECT * FROM Author WHERE deleted_at IS NULL;");
        */
        $authors = Author::all();
        return view('books.show', ['book' => $book, "authors" => $authors]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Book $book)
    {
        /*
        $authors = DB::connection('storage')
            ->select("SELECT * FROM Author WHERE deleted_at IS NULL;");
        */
        $authors = Author::all();
        return view('books.edit', ['book' => $book, "authors" => $authors]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Book $book)
    {
        $this->validation($request, $book);

        $book->update($request->all());

        return redirect()->route('books.index')
            ->with('success', 'Book updated successfully');
    }

    /**
     * This function validates and completes the input of the book create and update forms.
     */
    private function validation(Request $request, Book $book)
    {
        $request->validate([
            'ISBN' => 'required|max:36',
            'title' => 'required|max:100',
            'year' => 'required|Integer|min:700|max:2023',
            'edition' => 'required|Integer|min:1|max:30',
            'editorial' => 'required|max:50',
            'dimensions' => 'required|max:20',
            'unitPrice' => 'required|numeric|min:0',
            'author_id' => 'required'
        ]);

        // Look for the name of the author that has been chosen in the storage connection database.
        /*
        $author = DB::connection('storage')
        ->select("SELECT * FROM Author WHERE deleted_at IS NULL AND id = '" . $request->input('author_id') . "';");
        $request->merge(['author' => $author[0]->name]);
        */
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Book $book)
    {
        $book->delete();

        return redirect()->route('books.index')
            ->with('success', 'Book deleted successfully');
    }

    /**
     * Restore the specified resource from storage.
     */
    public function restore(Request $request, string $isbn)
    {
        $isbn = $request->input("ISBN");
        $book = Book::withTrashed()->find($isbn);
        $book->restore();

        return redirect()->route('books.index')
            ->with('success', 'Book restored successfully');
    }

    // Fonction de recherche
    public function search(Request $request)
    {
        $search = $request->input('search');
        $books = Book::where('title', 'like', '%' . $search . '%')
            ->orWhere('ISBN', 'like', '%' . $search . '%')
            ->get();
        return view('books.books', compact('books'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }
}
