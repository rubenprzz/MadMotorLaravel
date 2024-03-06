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
        //si no hay sesion iniciada auth que mande al login
        if (!auth()->check()) {
            return redirect()->route('login');
        }
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

            // Si es vehiculo redirigir a vehiculos.index y si es pieza a piezas.index
            if ($type == 'vehiculo') {
                return redirect()->route('vehiculos.index')->with('success', 'Vehiculo añadido al carrito');
            } else if ($type == 'pieza') {
                return redirect()->route('piezas.index')->with('success', 'Pieza añadida al carrito');
            }

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

            // Guardar el carrito actualizado en la sesión
            session()->put('cart', $cart);
            //mantenerse en la misma pagina
            return redirect()->route('carrito.index')->with('success', 'Producto eliminado del carrito');


        }
    }


}
