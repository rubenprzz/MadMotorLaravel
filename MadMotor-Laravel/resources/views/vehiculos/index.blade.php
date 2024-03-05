@extends('main')
@section('title', 'Vehiculos')
@section('content')
    <div class="container pt-20 mt-5">
        <h1 class="text-3xl font-bold ">Vehículos</h1>
        <div class="grid grid-cols-4 gap-4">

            <div class="col-span-1">
                <form action="{{ route('vehiculos.index') }}" method="GET" class="">
                    <div class="flex flex-col gap-2">
                        <div class="flex-1">
                            <label for="marca" class="block mb-2">Marca:</label>
                            <input type="text" name="marca" id="marca" class="w-full p-2 border border-gray-300 rounded"
                                   value="{{ request('marca') }}">
                        </div>
                        <div class="flex-1">
                            <label for="modelo" class="block mb-2">Modelo:</label>
                            <input type="text" name="modelo" id="modelo"
                                   class="w-full p-2 border border-gray-300 rounded"
                                   value="{{ request('modelo') }}">
                        </div>
                        <div class="flex-1">
                            <label for="yearMin" class="block mb-2">Año min:</label>
                            <input type="text" name="yearMin" id="yearMin"
                                   class="w-full p-2 border border-gray-300 rounded"
                                   value="{{ request('yearMin') }}">
                        </div>
                        <div class="flex-1">
                            <label for="yearMax" class="block mb-2">Año Max:</label>
                            <input type="text" name="yearMax" id="yearMax"
                                   class="w-full p-2 border border-gray-300 rounded"
                                   value="{{ request('yearMax') }}">
                        </div>
                        <div class="flex-1">
                            <label for="precioMin" class="block mb-2">Precio min:</label>
                            <input type="text" name="precioMin" id="precioMin"
                                   class="w-full p-2 border border-gray-300 rounded"
                                   value="{{ request('precioMin') }}">
                        </div>
                        <div class="flex-1">
                            <label for="precioMax" class="block mb-2">Precio max:</label>
                            <input type="text" name="precioMax" id="precioMax"
                                   class="w-full p-2 border border-gray-300 rounded"
                                   value="{{ request('precioMax') }}">
                        </div>
                    </div>
                    <button type="submit" class="bg-blue-500 text-white px-4 py-2 mt-4 rounded hover:bg-blue-600">Buscar
                    </button>
                </form>
            </div>

            <div class="col-span-3">

                <div class="flex flex-col gap-4">
                    @foreach ($vehiculos as $vehiculo)
                        <div class="bg-white shadow rounded p-4">
                            <h2 class="text-lg font-semibold">{{ $vehiculo->marca }} {{ $vehiculo->modelo }}</h2>
                            <p>Año: {{ $vehiculo->year }}</p>
                            <p>Kilómetros: {{ $vehiculo->kilometros }}</p>
                            <p>Precio: {{ $vehiculo->precio }}</p>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection
