<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB;

use App\Models\Book;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        /*
        $books = DB::connection('storage')
            ->select("SELECT * FROM Book B INNER JOIN Author A ON B.author_id = A.id WHERE B.Deleted_at IS NULL;");
        foreach ($books as $book)
        {
            DB::table('book')->insert([
                    'ISBN' => $book->ISBN, 
                    'title' => $book->title, 
                    'year' => $book->year,
                    'edition' => $book->edition,
                    'editorial' => $book->editorial,
                    'description' => $book->description,
                    'dimensions' => $book->dimensions,
                    'unitPrice' => $book->unitPrice,
                    'author_id' => $book->author_id,
                    'author' => $book->name,
            ]);        
        }
        */
        Book::factory()
            ->count(50)
            ->create();
    }
}

