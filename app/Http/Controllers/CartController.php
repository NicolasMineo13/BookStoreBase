<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Book;
use App\Models\Cart;
use App\Models\Item;

use Illuminate\Support\Facades\DB;

class CartController extends Controller
{
    /**
     * Add the provided book to the .
     */
    public function addItem(Request $request, Book $book)
    {
        $cartCode = '';
        $cart = NULL;
        $user = auth()->user();

        // Start of the transaction.
        //DB::beginTransaction();
        if ($request->session()->has('Cart_code'))
        {   
            // The cart for this session already exists.
            $cartCode = $request->session()->get('Cart_code');   
            // Get the cart object complet if it was already existent.
            $cart = Cart::find($cartCode);  
        }
        else
        {
            // It is necessary to create a new cart for the current session.
            $dataCart = ['date' => now(), 'total' => $book->unitPrice, 'user_id' => $user->id ];
            $cart = Cart::create($dataCart);
            $cartCode = $cart->code;
        }

        $cart->total = $cart->total + $book->unitPrice;

        $cart->save();

        $dataItem = ['quantity' => 1, 'total' => $book->unitPrice, 'description' => '', 'book_id' => $book->ISBN, 
        'cart_id' =>  $cartCode];
        Item::create($dataItem);
        
        // End of the transaction.
        //DB::commit();

        $request->session()->put('Cart_code', $cartCode);

        return redirect()->route('cart.show', ['cart' => $cart->code] );
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request, Cart $cart)
    {
        $items = Item::where('cart_id', $cart->code)->get();
        return view('cart.show', ['cart'=> $cart, "items" => $items]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Cart $cart)
    {
        $items = Item::where('cart_id', $cart->code)->get();
        return view('cart.edit', ['cart' => $cart, "items" => $items]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function reset(Request $request, Cart $cart)
    {
        // Start of the transaction.
        DB::beginTransaction();
        $items = Item::where('cart_id', $cart->code)->update(['deleted_at' => now()]);
        $cart->total = 0.0;
        $cart->save();
        // End of the transaction.
        DB::commit();
        $items = Item::where('cart_id', $cart->code)->get();

        return view('cart.edit', ['cart' => $cart, "items" => $items]);
    }

}
