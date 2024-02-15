<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

use App\Models\Author;
use App\Models\User;

use Illuminate\Foundation\Testing\DatabaseTransactions;

class AuthorTest extends TestCase
{
    // Used to rollback all operations done during these tests.
    use DatabaseTransactions;

    /**
     * Test the creation of an author.
     */
    public function test_create_author(): void
    { 
       // Create an user and a book to make the test.
       $user = User::factory()->create();
       // Create an author without inserting it in the database.
       $author = Author::factory()->make();
       
       // Convert the book data into a PHP Array.
       $data = json_decode($author, true);

       // Send a post request in a session for the user created and to create the book. 
       $response = $this->actingAs($user, 'web')
               ->withSession(['banned' => false])
               ->post('/authors/store', $data);
               
        // Test if the response is a redirection to this URI.
        $response->assertRedirect(ENV('APP_URL') . "/authors");
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
