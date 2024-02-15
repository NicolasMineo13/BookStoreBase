<?php

namespace App\Http\Controllers;

use App\Models\Command;
use App\Models\Book;
use App\Models\Cart;
use App\Models\Item;


use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

class CommandController extends Controller
{

     /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $commands = Command::withTrashed()->get();
        return view("command.commands",compact('commands'))
                    ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request, Command $command)
    {
        $cart = Cart::find($command->cart_id);
        $items = Item::where('cart_id', $cart->code)->get();
        return view('command.show', ['command' => $command, "items" => $items]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request, Cart $cart)
    {
        $items = Item::where('cart_id', $cart->code)->get();
        return view('command.create',['cart'=> $cart, "items" => $items]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Cart $cart)
    {
        $this->validation($request, $cart);

        $cart = Cart::find($request->input("code"));
        $numberOfCommands = count(Command::all());
        $user = auth()->user();
        $code = 'CU-' . $user->id . "-" . now()->format('Ymd') . "N" . $numberOfCommands + 1; 
        $code = str_pad($code, 36, "0", STR_PAD_LEFT);
        $data = ['code' => $code, 'date' => now(), 'total' => $request->input('total'), 
                 'address' => $request->input('address'), 'description' => $request->input('description'), 
                 'user_id' => $user->id, 
                 'cart_id' => $cart->code];

        Command::create($data);
         
        return redirect()->route('books.index')
                        ->with('success','Command created successfully.');
    }

      /**
     * This function validates and completes the input of the book create and update forms.
     */
    private function validation(Request $request, Cart $cart)
    {
        $request->validate([
            'address' => 'required|max:100',
            'description' => 'required|max:500'
        ]);
    }
}
