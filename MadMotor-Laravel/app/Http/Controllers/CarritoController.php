<?php

namespace App\Http\Controllers;

use App\Models\Pieza;
use App\Models\Vehiculo;
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

    public function addToCart($id, $type)
    {
        // Inicializar el carrito si no existe
        if (!session()->has('cart')) {
            session()->put('cart', []);
        }

        $product = null;
        if ($type == 'vehiculo') {
            $product = Vehiculo::find($id);
        } else if ($type == 'pieza') {
            $product = Pieza::find($id);
        }
        //comprobar si hay stock
        if ($product->cantidad <= 0) {
            return redirect()->route('vehiculos.index')->with('error', 'No hay stock');
        }

        if ($product) {
            $cart = session()->get('cart');
            $key = $type . '-' . $id;

            if (isset($cart[$key])) {
                $cart[$key]['quantity']++;
                $cart[$key]['line_total'] = $cart[$key]['price'] * $cart[$key]['quantity'];
            } else {
                $cart[$key] = [
                    'type' => $type,
                    'product' => $product,
                    'price' => $product->precio,
                    'quantity' => 1,
                    'line_total' => $product->precio
                ];
            }
            // Guardar el carrito en la sesión
            session()->put('cart', $cart);
            return redirect()->route('vehiculos.index');

        }
    }

    public function removeFromCart($id, $type)
    {
        // Obtener el carrito de la sesión
        $cart = session()->get('cart');

        // Crear la clave del producto
        $key = $type . '-' . $id;

        // Si el producto está en el carrito, eliminarlo
        if (isset($cart[$key])) {
            unset($cart[$key]);

            $product = null;
            if ($type == 'vehiculo') {
                $product = Vehiculo::find($id);
            } else if ($type == 'pieza') {
                $product = Pieza::find($id);
            }

            // Guardar el carrito actualizado en la sesión
            session()->put('cart', $cart);


        }
    }


}
