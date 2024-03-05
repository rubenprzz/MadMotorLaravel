@extends('main')

@section('title', 'ver  Perfil')

@section('content')
    <div class="container mt-5 pt-5">
        <h1>Ver Cliente</h1>
        <div class="form-group">
            <label for="nombre">Nombre:</label>
            <input class="form-control" id="nombre" name="nombre" type="text" required value="{{$cliente->nombre}}" disabled>
        </div>
        <div class="form-group">
            <label for="apellido">Apellidos:</label>
            <input class="form-control" id="apellido" name="apellido" type="text" required value="{{$cliente->apellido}}" disabled>
        </div>
        <div class="form-group mb-3">
            <label for="email">Correo:</label>
            <input class="form-control" id="email" name="email" type="email" required value="{{$cliente->email}}" disabled>
        </div>
        <a class="btn btn-primary mb-5" href="{{ route('cliente.edit', $cliente->id) }}">Editar</a>
        <a class="btn btn-secondary mx-2 mb-5" href="{{ route('vehiculos.hero') }}">Volver</a>
    </div>

@endsection
