@php use App\Models\Personal; @endphp

@extends('main')

@section('title', 'Mostrar Personal')

@section('content')

    <div class="container">
        <div class="section-title">
            <span>Mostrar Personal</span>
            <h2>Mostrar Personal</h2>
        </div>

        <div class="form-group">
            <dl class="row">
                <dt class="col-sm-2">ID:</dt>
                <dd class="col-sm-10">{{ $personal->id }}</dd>
                <dt class="col-sm-2">Nombre:</dt>
                <dd class="col-sm-10">{{ $personal->nombre }}</dd>
                <dt class="col-sm-2">Apellidos:</dt>
                <dd class="col-sm-10">{{ $personal->apellidos }}</dd>
                <dt class="col-sm-2">Fecha de Nacimiento:</dt>
                <dd class="col-sm-10">{{ $personal->fechaNacimiento }}</dd>
                <dt class="col-sm-2">DNI:</dt>
                <dd class="col-sm-10">{{ $personal->dni }}</dd>
                <dt class="col-sm-2">Dirección:</dt>
                <dd class="col-sm-10">{{ $personal->direccion }}</dd>
                <dt class="col-sm-2">Teléfono:</dt>
                <dd class="col-sm-10">{{ $personal->telefono }}</dd>
                <dt class="col-sm-2">Sueldo:</dt>
                <dd class="col-sm-10">{{ $personal->sueldo }}</dd>
                <dt class="col-sm-2">IBAN:</dt>
                <dd class="col-sm-10">{{ $personal->iban }}</dd>
                <dt class="col-sm-2">Email:</dt>
                <dd class="col-sm-10">{{ $personal->email }}</dd>
                <dt class="col-sm-2">Rol:</dt>
                <dd class="col-sm-10">{{ $personal->rol }}</dd>
            </dl>

            <a class="btn btn-primary" href="{{ route('personal.index') }}">Volver</a>
        </div>

@endsection
