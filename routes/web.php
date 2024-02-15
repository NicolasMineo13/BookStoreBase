<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\BookController;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CommandController;
use App\Http\Controllers\ItemController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware('auth')->controller(BookController::class)->group(function () {
    // These routes are associated with a Web application. 
    Route::get('/books', 'index')->name('books.index');
    Route::get('/books/create', 'create')->name('books.create');
    Route::post('/books/store', 'store')->name('books.store');
    Route::get('/books/{book}', 'show')->name('books.show');
    Route::get('/books/{book}/edit', 'edit')->name('books.edit');
    Route::post('/books/{book}', 'update')->name('books.update');
    Route::delete('/books/{book}', 'destroy')->name('books.destroy');
    Route::post('/books',  ['as' => 'books.restore', 'uses' => 'App\Http\Controllers\BookController@index']);
});

Route::middleware('auth')->controller(AuthorController::class)->group(function () {
    // These routes are associated with a Web application. 
    Route::get('/authors', 'index')->name('author.index');
    Route::get('/authors/create', 'create')->name('author.create');
    Route::post('/authors/store', 'store')->name('author.store');
    Route::get('/authors/{author}', 'show')->name('author.show');
    Route::get('/authors/{author}/edit', 'edit')->name('author.edit');
    Route::post('/authors/{author}', 'update')->name('author.update');
    Route::delete('/authors/{author}', 'destroy')->name('author.destroy');
    Route::post('/authors',  ['as' => 'author.restore', 'uses' => 'App\Http\Controllers\AuthorController@index']);
});

Route::middleware('auth')->controller(CartController::class)->group(function () {
    
    // These routes are associated with a REST API. 
    Route::get('/cart/addItem/{book}', 'addItem')->name('cart.addItem');
    Route::get('/cart/{cart}', 'show')->name('cart.show');
    Route::get('/cart/{cart}/edit', 'edit')->name('cart.edit');
    Route::post('/cart/{cart}', 'update')->name('cart.update');
    Route::post('/cart/{cart}/reset', 'reset')->name('cart.reset');
});

Route::middleware('auth')->controller(ItemController::class)->group(function () {
    
    // These routes are associated with a REST API. 
    Route::delete('/items/{item}/{cart}', 'destroy')->name('item.destroy');
    Route::post('/books/{item}/{cart}', 'update')->name('item.update');
});

Route::middleware('auth')->controller(CommandController::class)->group(function () {
    
    // These routes are associated with a REST API. 
    Route::get('/commands', 'index')->name('command.index');
    Route::get('/commands/{command}/show', 'show')->name('command.show');
    Route::get('/commands/{cart}/create', 'create')->name("command.create");
    Route::post('/commands', 'store')->name('command.store');

});

require __DIR__.'/auth.php';
