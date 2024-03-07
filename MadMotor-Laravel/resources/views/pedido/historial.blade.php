@extends('main')

@section('content')
    <div class="container mx-auto">
        <div class="flex justify-center items-center h-screen">
            <h1 class="text-4xl font-bold">Historial de Pedidos</h1>
            <table class="table-auto">
                <thead>
                <tr>
                    <th class="px-4 py-2">ID del Pedido</th>
                    <th class="px-4 py-2">Fecha del Pedido</th>
                    <th class="px-4 py-2">Total del Pedido</th>
                    <!-- Agrega más columnas según sea necesario -->
                </tr>
                </thead>
                <tbody>
                @foreach ($orders as $order)
                    <tr>
                        <td class="border px-4 py-2">{{ $order->id }}</td>
                        <td class="border px-4 py-2">{{ $order->order_date }}</td>
                        <td class="border px-4 py-2">{{ $order->total }}</td>
                        <!-- Agrega más columnas según sea necesario -->
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
