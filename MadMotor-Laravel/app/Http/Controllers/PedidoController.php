<?php

namespace App\Http\Controllers;

use App\Models\LineaDePedido;
use App\Models\Pedido;
use App\Models\Pieza;
use App\Models\Vehiculo;
use Illuminate\Http\Request;

class PedidoController extends Controller
{
    public function checkout(Request $request)
    {
        // Obtener el carrito de la sesión
        $cart = session()->get('cart');

        // Crear un nuevo pedido
        $pedido = new Pedido();
        $pedido->idCliente = auth()->user()->id;
        $pedido->datosTarjeta = $request->input('datosTarjeta');
        $pedido->direccion = $request->input('direccion');
        $pedido->total = array_sum(array_column($cart, 'line_total'));
        $pedido->estado = 'confirmado';
        $pedido->save();

        // Crear una línea de pedido para cada artículo en el carrito
        foreach ($cart as $item) {
            $lineaDePedido = new LineaDePedido();
            $lineaDePedido->idPedido = $pedido->id;
            if ($item['type'] == 'vehiculo') {
                $lineaDePedido->idVehiculo = $item['product']->id;
                $lineaDePedido->precioVehiculo = $item['price'];
                $lineaDePedido->cantidadVehi = $item['quantity'];
            } else {
                $lineaDePedido->idPieza = $item['product']->id;
                $lineaDePedido->precioPieza = $item['price'];
                $lineaDePedido->cantidadPieza = $item['quantity'];
            }
            $lineaDePedido->totalLinea = $item['line_total'];
            $lineaDePedido->save();
        }

        //Una vez que todos los productos estén en la línea de pedido, restar cantidad de stock
        foreach ($cart as $item) {
            if ($item['type'] == 'vehiculo') {
                $vehiculo = Vehiculo::find($item['product']->id);
                $vehiculo->cantidad -= $item['quantity'];
                $vehiculo->save();
            } else {
                $pieza = Pieza::find($item['product']->id);
                $pieza->cantidad -= $item['quantity'];
                $pieza->save();
            }
        }

        // Vaciar el carrito
        session()->forget('cart');

        // Redirigir al usuario a la página de confirmación
        return redirect()->route('pedido.confirmacion', ['id' => $pedido->id]);
    }

    public function confirmacion($id)
    {
        $pedido = Pedido::find($id);
        return view('pedido.confirmacion')->with('pedido', $pedido);
    }
    public function confirmado($id)
    {
        $pedido = Pedido::find($id);
        $pedido->estado = 'confirmado';
        $pedido->save();
        return redirect()->route('pedido.historial');
    }
}
