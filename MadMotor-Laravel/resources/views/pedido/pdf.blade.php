<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <main>
        <section>

            <div>
                <h1>Pedido Confirmado</h1>
                <p>Gracias por tu compra, {{ $pedido->cliente->nombre }}!</p>
                <p>Tu pedido ha sido confirmado y está siendo procesado. Te enviaremos un correo
                    electrónico
                    con la información de seguimiento una vez que tu pedido sea enviado.</p>
                <div>
                    <h2>Detalles del Pedido</h2>
                    <ul>
                        <li>Número de pedido: {{ $pedido->id }}</li>
                        <li>Fecha: {{ $pedido->created_at->format('d/m/Y') }}</li>
                        <li>Total: {{ $pedido->total }} €</li>
                        <li>Estado: {{ $pedido->estado }}</li>
                    </ul>
                </div>
                <div>
                    <h2>Productos Comprados</h2>
                    <table>
                        <thead>
                        <tr>
                            <th>Producto</th>
                            <th>Cantidad</th>
                            <th>Precio</th>
                            <th>Total</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($pedido->lineasDePedido as $linea)
                            <tr>
                                <td>
                                    @if ($linea->idVehiculo)
                                        {{ $linea->vehiculo->marca }}
                                    @else
                                        {{ $linea->pieza->nombre }}
                                    @endif
                                </td>
                                <td>
                                    @if ($linea->idVehiculo)
                                        {{ $linea->cantidadVehi }}
                                    @else
                                        {{ $linea->cantidadPieza }}
                                    @endif
                                </td>
                                <td>
                                    @if ($linea->idVehiculo)
                                        {{ $linea->precioVehiculo }} €
                                    @else
                                        {{ $linea->precioPieza }} €
                                    @endif
                                </td>
                                <td>
                                    {{ $linea->totalLinea }} €
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>


            </div>
        </section>
    </main>
    <script type="text/php">

    </script>

</body>
</html>
