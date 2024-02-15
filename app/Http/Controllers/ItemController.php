<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Book;
use App\Models\Cart;
use App\Models\Item;

use Illuminate\Support\Facades\DB;

class ItemController extends Controller
{
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, Item $item, Cart $cart)
    {
        // Start of the transaction.
        DB::beginTransaction();
        $item->delete();

        $cart->total = $cart->total - $item->total;
        $cart->save();

        // End of the transaction.
        DB::commit();
         
        return redirect()->route('cart.edit', ['cart' => $cart])
                        ->with('success','Item deleted successfully');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Item $item, Cart $cart)
    {
        $this->validation($request, $item, $cart);
        $quantity = $request->input("quantity_" . $item->code);
        $description = ($request->input("description_" . $item->code) ? $request->input("description_" . $item->code) : "");

        $book = Book::find($item->book_id);

        // Substraction of the current item total.
        $cart->total = $cart->total - $item->total;

        // Calcul of the new item total.
        $item->total = $quantity * $book->unitPrice;
        $item->quantity = $quantity;
        $item->description = $description;

        // Add the new total to the total of the cart.
        $cart->total = $cart->total + $item->total;

        // Start of the transaction.
        DB::beginTransaction();
        $item->save();
        $cart->save();
        
        // End of the transaction.
        DB::commit();

        return redirect()->route('cart.edit', ['cart' => $cart])
                            ->with('success','Item updated successfully');
    }

    /**
     * This function validates and completes the input of the Item create and update forms.
     */
    private function validation(Request $request, Item $item, Cart $cart)
    {
        $request->validate([
            'quantity_' . $item->code => 'required|numeric|min:0'
        ]);
        
        // Look for the name of the author that has been chosen in the storage connection database.
        return redirect()->route('cart.edit', ['cart' => $cart])
                         ->with('success','Item updated successfully');
    }


}
