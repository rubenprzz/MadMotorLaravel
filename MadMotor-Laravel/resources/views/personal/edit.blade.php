@php use App\Models\Personal; @endphp

@extends('main')

@section('title', 'Editar Personal')

@section('content')

    <div class="container">
        <div class="section-title">
            <span>Editar Personal</span>
            <h2>Editar Personal</h2>
        </div>

        @if ($errors->any())
            <div class="alert alert-danger alert-dismissible">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            <br/>
        @endif

        <form action="{{ route('personal.update', $personal->id) }}" method="post">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="puesto">Dirección:</label>
                <input class="form-control" id="direccion" name="direccion" type="text" placeholder="Direccion">
            </div>
            <div class="form-group">
                <label for="puesto">Teléfono:</label>
                <input class="form-control" id="telefono" name="telefono" type="text" placeholder="666666666">
            </div>
            <div class="form-group">
                <label for="puesto">Sueldo:</label>
                <input class="form-control" id="sueldo" name="sueldo" type="text" placeholder="Sueldo">
            </div>
            <div class="form-group">
                <label for="puesto">IBAN:</label>
                <input class="form-control" id="iban" name="iban" type="text" placeholder="ES000000000000000000">
            </div>
            <div class="form-group">
                <label for="puesto">Email:</label>
                <input class="form-control" id="email" name="email" type="text" placeholder="email@email.com">
            </div>
            <div class="form-group">
                <label for="puesto">Rol:</label>
                <select class="form-control" id="rol" name="rol">
                    <option value="Admin">Admin</option>
                    <option value="Personal">Personal</option>
                </select>
            </div>

            <button class="btn btn-primary" type="submit">Actualizar</button>
            <a class="btn btn-secondary mx-2" href="{{ route('personal.index') }}">Volver</a>
        </form>
    </div>
