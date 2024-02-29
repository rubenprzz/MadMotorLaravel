<?php

namespace App\Http\Controllers;

use App\Models\Vehiculo;
use Illuminate\Http\Request;

class VehiculoController extends Controller
{
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

        if ($request->has('orden')){
            $orden = $request->orden;
            switch ($orden) {
                case 'precioDesc':
                    $query->orderByPrecioDesc();
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
                    $query->orderByPrecioAcs();
                    break;
            }
        }

        $vehiculos = $query->get();

        return response()->json($vehiculos);
    }
}
