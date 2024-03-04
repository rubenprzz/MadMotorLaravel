@extends('main')

@section('title', 'Actualizar Perfil')

@section('content')
    <div class="container">
        <h1>Actualizar Cliente</h1>

        @if ($errors->any())
            <div class="alert alert-danger alert-dismissible">
                @foreach ($errors->all() as $error)
                    {{ $error }}<br>
                @endforeach
            </div>
        @endif

        <form action="{{ route("cliente.edit", $cliente->id) }}" method="post">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="nombre">Nombre:</label>
                <input class="form-control" id="nombre" name="nombre" type="text" required value="{{$cliente->nombre}}">
            </div>
            <div class="form-group">
                <label for="apellido">Apellidos:</label>
                <input class="form-control" id="apellido" name="apellido" type="text" required value="{{$cliente->apellido}}">
            </div>

            <div class="form-group mb-3">
                <label for="email">Correo:</label>
                <input class="form-control" id="email" name="email" type="email" required value="{{$client->email}}">
            </div>

            <button class="btn btn-primary mb-5" type="submit">Actualizar</button>
            <a class="btn btn-secondary mx-2 mb-5" href="{{ route('vehiculos.hero') }}">Volver</a>
        </form>
    </div>

@endsection
