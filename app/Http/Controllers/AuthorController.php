<?php

namespace App\Http\Controllers;


//use App\Models\Book;
use App\Models\Author;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;

class AuthorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $authors = Author::withTrashed()->get();
        return view("author.authors",compact('authors'))
                    ->with('i', (request()->input('page', 1) - 1) * 5);
    }
    
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('author.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Author $author)
    {
        $validator = $this->validation($request, $author);
        
        Author::create($request->all());
         
        return redirect()->route('author.index')
                        ->with('success','Author created successfully.');
    }
    
    /**
     * Display the specified resource.
     */
    public function show(Request $request, Author $author)
    {
        return view('author.show', ["author" => $author]);
    }

    
     /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request, Author $author)
    {
        return view('author.edit', ['author' => $author]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Author $author)
    {
       $this->validation($request, $author);

       $author->update($request->all());
        
       return redirect()->route('author.index')
                        ->with('success','Author updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Author $author)
    {
        $author->delete();
         
        return redirect()->route('author.index')
                        ->with('success','Author deleted successfully');
    }

     /**
     * Restore the specified resource from storage.
     */
    public function restore(Request $request, string $id)
    {
       $id = $request->input("id");
       $author = Author::withTrashed()->find($id); 
       $author->restore();
         
        return redirect()->route('author.index')
                        ->with('success','Author restored successfully');
    }

    /**
     * This function validates and completes the input of the book create and update forms.
     */
    private function validation(Request $request, Author $author)
    {
        $request->validate([
            'id' => 'required|max:36',
            'name' => 'required|max:100',
            'lastName' => 'required|max:100',
            'birth' => 'required',
            'biography' => 'required|max:500'
        ]);
    }
}
