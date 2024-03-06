@extends('main')
@section('title', 'Confirmación de compra')
@section('content')
    <section class="bg-gray-900 ">
        <div class=" pt-5 h-screen py-8">
            <div class="container mx-auto mt-5 px-4">
                <h1 class="text-2xl font-semibold text-white mb-4">Confirmación de compra</h1>
                <div class="flex flex-col md:flex-row gap-4">
                    <div class="md:w-3/4">
                        <div class="bg-white rounded-lg shadow-md p-6 mb-4 overflow-y-auto" style="max-height: 60vh;">
                            @if(session('success'))
                                <div id="success-alert"
                                     class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mb-4"
                                     role="alert">
                                    <p class="font-bold">Success</p>
                                    <p>{{ session('success') }}</p>
                                </div>
                            @endif
                            <table class="w-full">
                                <thead>
                                <tr>
                                    <th class="text-left font-semibold">Producto</th>
                                    <th class="text-left font-semibold">Precio</th>
                                    <th class="text-left font-semibold">Cantidad</th>
                                    <th class="text-left font-semibold">Total</th>
                                    <th class="text-left font-semibold">Acciones</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($cart as $item)
                                    <tr>
                                        <td class="py-4">
                                            <div class="flex items center">
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
                                            <span class="font-semibold">{{ $item['product']->precio }} €</span>
                                        </td>
                                        <td class="py-4">
                                            <span class="font-semibold">{{ $item['quantity'] }}</span>
                                        </td>
                                        <td class="py-4">
                                            <span class="font-semibold">{{ $item['product']->precio * $item['quantity'] }} €</span>
                                        </td>
                                        <td class="py-4">
                                            <form action="
                                            " method="post">
                                                @csrf
                                                <input type="hidden" name="id" value="{{ $item['product']->id }}">
                                                <button type="submit"
                                                        class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">
                                                    Eliminar
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="md:w-1/4">
                        <div class="bg-white rounded-lg shadow-md p-6 mb-4">
                            <h2 class="text-xl font-semibold mb-4">Resumen de compra</h2>
                            <div class="flex justify-between mb-2">
                                <span class="font-semibold">Subtotal</span>
                                <span class="font-semibold">{{ $subtotal }} €</span>
                            </div>
                            <div class="flex justify-between mb-2">
                                <span class="font-semibold">IVA (21%)</span>
                                <span class="font-semibold">{{ $iva }} €</span>
                            </div>
                            <div class="flex justify-between mb-2">
                                <span class="font-semibold">Total</span>
                                <span class="font-semibold">{{ $total }} €</span>
                            </div>
                            <form action="" method="post">
                                @csrf
                                <button type="submit"
                                        class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded w-full">
                                    Confirmar compra
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
