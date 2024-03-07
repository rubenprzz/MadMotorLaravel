@extends('main')

@section('title', 'Vehículos - Panel de Administración')

@section('content')
    <section class="bg-gray-900 font text-white">
        <div class="container rounded-4 pt-5 mt-3 shadow-lg bg-gray-700 ">
            <h1 class="text-3xl text-center font-bold mt-5">Listado de Vehículos</h1>
            <form action="{{ route('vehiculos.adminIndex') }}" method="GET" class="mb-6">
                <div class="flex items-center">
                    <input type="text" name="marca" placeholder="Buscar por marca"
                           class="border border-gray-300 px-4 py-2 rounded-lg mr-4 focus:outline-none focus:border-indigo-500">
                    <button type="submit"
                            class="bg-indigo-500 text-white px-4 py-2 rounded-lg hover:bg-indigo-600 focus:outline-none focus:bg-indigo-600">
                        Buscar
                    </button>
                    <!-- Create button -->
                    <a href="{{ route('vehiculos.create') }}"
                       class="bg-green-500 hover:bg-green-600 text-white px-4 py-2 rounded-lg ml-auto">Crear
                        Vehículo</a>
                </div>
            </form>

            <div class="overflow-x-auto">
                <table class="table-auto w-full">
                    <thead>
                    <tr>
                        <th class="px-4 py-2">Marca</th>
                        <th class="px-4 py-2">Modelo</th>
                        <th class="px-4 py-2">Año</th>
                        <th class="px-4 py-2">Acciones</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($vehiculos as $vehiculo)
                        <tr>
                            <td class="border px-4 py-2">{{ $vehiculo->marca }}</td>
                            <td class="border px-4 py-2">{{ $vehiculo->modelo }}</td>
                            <td class="border px-4 py-2">{{ $vehiculo->year }}</td>
                            <td class="border px-4 py-2">
                                <a href="{{ route('vehiculos.edit', $vehiculo->id) }}"
                                   class="bg-blue-500 hover:bg-blue-600 text-white px-3 py-1 rounded-lg mr-2">Editar</a>
                                <a href="{{ route('vehiculos.show', $vehiculo->id) }}"
                                   class="bg-green-500 hover:bg-green-600 text-white px-3 py-1 rounded-lg mr-2">Ver
                                    detalles</a>
                                <form action="{{ route('vehiculos.destroy', $vehiculo->id) }}" method="POST"
                                      class="inline-block">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                            class="bg-red-500 hover:bg-red-600 text-white px-3 py-1 rounded-lg">Borrar
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                {{ $vehiculos->links()}}
            </div>
        </div>
    </section>
@endsection
