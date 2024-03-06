@php
    use App\Models\Personal;
@endphp

@extends('main')

@section('title', 'Mostrar Personal')

@section('content')
    <div class="bg-gray-900 text-white">
        <section>
            <div class="container">
                <div class="section-title">
                    <h2>Mostrar Personal</h2>
                </div>

                <div class="form-group mt-5">
                    <dl class="row">
                        <dt class="col-sm-3">ID:</dt>
                        <dd class="col-sm-9">{{ $personal->id }}</dd>

                        <dt class="col-sm-3">Nombre:</dt>
                        <dd class="col-sm-9">{{ $personal->nombre }}</dd>

                        <dt class="col-sm-3">Apellidos:</dt>
                        <dd class="col-sm-9">{{ $personal->apellidos }}</dd>

                        <dt class="col-sm-3">Fecha de Nacimiento:</dt>
                        <dd class="col-sm-9">{{ $personal->fecha_nacimiento }}</dd>

                        <dt class="col-sm-3">DNI:</dt>
                        <dd class="col-sm-9">{{ $personal->dni }}</dd>

                        <dt class="col-sm-3">Dirección:</dt>
                        <dd class="col-sm-9">{{ $personal->direccion }}</dd>

                        <dt class="col-sm-3">Teléfono:</dt>
                        <dd class="col-sm-9">{{ $personal->telefono }}</dd>

                        <dt class="col-sm-3">Sueldo:</dt>
                        <dd class="col-sm-9">{{ $personal->sueldo }} {{ '€' }}</dd>

                        <dt class="col-sm-3">IBAN:</dt>
                        <dd class="col-sm-9">{{ $personal->iban }}</dd>

                        <dt class="col-sm-3">Email:</dt>
                        <dd class="col-sm-9">{{ $personal->email }}</dd>

                        <dt class="col-sm-3">Rol:</dt>
                        <dd class="col-sm-9">{{ $personal->role }}</dd>
                    </dl>
                </div>
                <!--Botones-->
                <div class="botones d-flex mt-5">
                    <div class="form-group mx-2">
                        <a class="btn btn-secondary" href="{{ route('personal.search') }}">Volver</a>
                    </div>
                    <div class="form-group mx-2">
                        <a class="btn btn-black text-white border-white" href="{{ route('personal.edit', $personal->id) }}">Editar</a>
                    </div>
                    <div class="form-group mx-2">
                        <a class="btn btn-danger" href="{{ route('personal.search') }}">Borrar</a>
                    </div>
                </div>
                <!--Fin Botones-->
            </div>
        </section>
    </div>
@endsection
