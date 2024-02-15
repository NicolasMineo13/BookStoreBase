<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;
use App\Models\Book;
use App\Models\Author;

use Illuminate\Foundation\Testing\DatabaseTransactions;

class BookTest extends TestCase
{
    // Maybe using Dusk to put in place the test environment.
    // Used to rollback all operations done during these tests.
    use DatabaseTransactions;

    /**
     * A basic feature test example.
     */
    public function test_create_book(): void
    {
        // Create an user and a book to make the test.
        $user = User::factory()->create();
        $author = Author::factory()->create();
        $book = Book::factory()->make();

        // Convert the book data into a PHP Array.
        $data = json_decode($book, true);

        // Send a post request in a session for the user created and to create the book. 
        $response = $this->actingAs($user, 'web')
                ->withSession(['banned' => false])
                ->post('/books/store', $data);

        //$response->assertStatus(302);
        //$response->dump();
        // Test if the response is a redirection to this URI.
        $response->assertRedirect(ENV('APP_URL') . "/books");
    }

    /**
     * A basic feature test example.
     */
    public function test_example(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }
}
