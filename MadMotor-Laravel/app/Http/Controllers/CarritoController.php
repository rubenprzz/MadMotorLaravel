<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CarritoController extends Controller
{
    public function index()
    {
        $cart = session()->get('cart', []);

        return view('carrito.index')->with([
            'cart' => $cart
        ]);
    }

}
