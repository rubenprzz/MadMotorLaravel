<?php

namespace App\Http\Controllers;

use App\Models\Pieza;
use App\Models\Vehiculo;
use Illuminate\Http\Request;

class VehiculoController extends Controller
{
    public function hero()
    {
        $vehiculos = Vehiculo::all()->take(8); //take(6) para que solo muestre 6 vehiculos (para que no se vea tan cargado el home
        $piezas = Pieza::all()->take(8); //take(6) para que solo muestre 6 piezas (para que no se vea tan cargado el home
        return view('hero')->with('vehiculos', $vehiculos)->with('piezas', $piezas);
    }

    public function index(Request $request)
    {
        $query = Vehiculo::query();

        if ($request->has('marca')) {
            $query->marca($request->marca);
        }

        if ($request->has('modelo')) {
            $query->modelo($request->modelo);
        }

        if ($request->has('yearMin')) {
            $query->yearMin($request->yearMin);
        }

        if ($request->has('yearMax')) {
            $query->yearMax($request->yearMax);
        }

        if ($request->has('kmMin')) {
            $query->kmMin($request->kmMin);
        }

        if ($request->has('kmMax')) {
            $query->kmMax($request->kmMax);
        }

        if ($request->has('precioMin')) {
            $query->precioMin($request->precioMin);
        }

        if ($request->has('precioMax')) {
            $query->precioMax($request->precioMax);
        }

        if ($request->has('orden')) {
            $orden = $request->orden;
            switch ($orden) {
                case 'precioAsc':
                    $query->orderByPrecioAsc();
                    break;
                case 'yearAcs':
                    $query->orderByYearAcs();
                    break;
                case 'yearDesc':
                    $query->orderByYearDesc();
                    break;
                case 'kmAcs':
                    $query->orderByKmAcs();
                    break;
                case 'kmDesc':
                    $query->orderByKmDesc();
                    break;
                default:
                    $query->orderByPrecioDesc();
                    break;
            }
        }
        //isDeleted and paginate 10
        $query->isDeleted();
        $query->paginate(10);
        //links paginate
        $vehiculos = $query->paginate(10)->appends($request->all());

        return view('vehiculos.index')->with('vehiculos', $vehiculos);
    }
}
