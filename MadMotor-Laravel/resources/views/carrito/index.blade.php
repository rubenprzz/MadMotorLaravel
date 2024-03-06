@php use App\Models\Vehiculo; @endphp
@php use App\Models\Pieza; @endphp
@extends('main')
@section('title', 'Carrito de compra')
@section('content')
    <section class="bg-gray-900 ">
        <div class=" pt-5 h-screen py-8">
            <div class="container mx-auto mt-5 px-4">
                <h1 class="text-2xl font-semibold text-white mb-4">Carrito de compra</h1>
                <div class="flex flex-col md:flex-row gap-4">
                    <div class="md:w-3/4">
                        <div class="bg-white rounded-lg shadow-md p-6 mb-4">
                            <table class="w-full">
                                <thead>
                                <tr>
                                    <th class="text-left font-semibold">Producto</th>
                                    <th class="text-left font-semibold">Precio</th>
                                    <th class="text-left font-semibold">Cantidad</th>
                                    <th class="text-left font-semibold">Total</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($cart as $item)
                                    <tr>
                                        <td class="py-4">
                                            <div class="flex items-center">
                                                @if($item['type'] == 'vehiculo')
                                                    @if ($item['product']->imagen != Vehiculo::$IMAGEN_DEFAULT )
                                                        <img src="{{ asset('storage/'.$item['product']->imagen) }}"
                                                             class="h-16 w-16 mr-4"
                                                             alt="coche">
                                                    @else
                                                        <img src="{{ $item['product']->imagen }}" class="h-20 w-20 mr-4"
                                                             alt="coche">
                                                    @endif
                                                @else
                                                    @if ($item['product']->imagen != Pieza::$IMAGE_DEFAULT  )
                                                        <img src="{{ asset('storage/'.$item['product']->imagen) }}"
                                                             class="h-16 w-16 mr-4"
                                                             alt="coche">
                                                    @else
                                                        <img src="{{ $item['product']->imagen }}" class="h-20 w-20 mr-4"
                                                             alt="coche">
                                                    @endif
                                                @endif
                                                <span class="font-semibold">@if($item['type'] == 'vehiculo')
                                                        {{ $item['product']->marca }} {{ $item['product']->modelo }}
                                                    @else
                                                        {{ $item['product']->nombre }}
                                                    @endif
                                                </span>
                                            </div>
                                        </td>
                                        <td class="py-4">
                                            {{ $item['price'] }}€
                                        </td>
                                        <td class="py-4">
                                            {{ $item['quantity'] }}

                                        </td>
                                        <td class="py-4">
                                            {{ $item['line_total'] }} €
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="md:w-1/4">
                        <div class="bg-white rounded-lg shadow-md p-6">
                            <h2 class="text-lg font-semibold mb-4">Summary</h2>
                            <div class="flex justify-between mb-2">
                                <span>Subtotal</span>
                                <span>$19.99</span>
                            </div>
                            <div class="flex justify-between mb-2">
                                <span>Taxes</span>
                                <span>$1.99</span>
                            </div>
                            <div class="flex justify-between mb-2">
                                <span>Shipping</span>
                                <span>$0.00</span>
                            </div>
                            <hr class="my-2">
                            <div class="flex justify-between mb-2">
                                <span class="font-semibold">Total</span>
                                <span class="font-semibold">$21.98</span>
                            </div>
                            <button class="bg-blue-500 text-white py-2 px-4 rounded-lg mt-4 w-full">Checkout</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
@foreach($cart as $item)
    <tr>
        <td>
            @if($item['type'] == 'vehiculo')
                {{ $item['product']->marca }} {{ $item['product']->modelo }}
            @else
                {{ $item['product']->nombre }}
            @endif
        </td>
        <td>{{ ucfirst($item['type']) }}</td>
        <td>{{ $item['quantity'] }}</td>
        <td> {{ $item['price'] }} </td>
    </tr>
@endforeach
