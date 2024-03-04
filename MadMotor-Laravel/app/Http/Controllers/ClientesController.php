<?php

namespace App\Http\Controllers;

use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Http\Request;
use App\Models\Clientes;
use Illuminate\Support\Facades\Log;

class ClientesController extends Controller
{

    public function index(Request $request)
    {
        try {
            $clientes = Clientes::search($request->search)->orderBy('id', 'asc')->paginate(10);
            Log::info('Se han obtenido los clientes correctamente');
            return response()->json(['clientes' => $clientes, 'status' => 'ok']);
        } catch (\Exception $e) {
            Log::error('Error al obtener los clientes: ' . $e->getMessage());
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    public function create()
    {
        Log::info('Se ha accedider a la vista de creación de clientes');
        return response()->json(['status' => 'ok']);
    }

    public function store(Request $request)
    {
        Log::info('Se ha pedido crear un nuevo cliente');
        $request->validate([
            'nombre' => 'required|string|max:255|min:3',
            'email' => 'required|email',
            'password' => 'required|string|max:255|min:3',
            'apellido' => 'required|string|max:255|min:3',
            'direccion' => 'required|string|max:255|min:3',
            'codigo_postal' => 'required|min:5|max:5|regex:/^[0-9]{5}$/',
            'dni' => 'required| min:9|max:9|regex:/^[0-9]{8}[A-Za-z]$/|unique:clientes,dni',
        ]);
        Log::info('Se ha validado correctamente el cliente');
        try {
            $cliente = new Clientes($request->all());
            $cliente->role = 'cliente';
            Log::info('Se ha va a crear el cliente correctamente con los siguientes datos: ' . json_encode($cliente));
            $cliente->save();
            Log::info('Se ha creado el cliente correctamente');
            return response()->json(['status' => 'ok', 'cliente' => $cliente]);
        } catch (\Exception $e) {
            Log::error('Error al crear el cliente: ' . $e->getMessage());
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    /**
     * @throws AuthorizationException
     */
    public function show($id)
    {
        $cliente = Clientes::find($id);
        $this->authorize('view', $cliente);

        try {
            $cliente = Clientes::find($id);
            if ($cliente == null) {
                Log::error('No se ha encontrado el cliente con el id: ' . $id);
                return response()->json(['error' => 'No se ha encontrado el cliente'], 404);
            }
            Log::info('Se ha obtenido el cliente correctamente');
            return view('cliente.show')->with('cliente', $cliente);

        } catch (\Exception $e) {
            Log::error('Error al obtener el cliente: ' . $e->getMessage());
            return response()->json(['error2' => $e->getMessage()], 404);
        }
    }

    public function edit(Request $request, $id)
    {
        try {
            $cliente = Clientes::find($id);
            if ($cliente == null || $cliente->isDeleted) {
                Log::error('No se ha encontrado el cliente con el id: ' . $id);
                return response()->json(['error' => 'No se ha encontrado el cliente'], 404);
            }
            $cliente->update($request->all());
            Log::info('Se ha obtenido el cliente para actualizar correctamente');
            return redirect()->route('clientes.show', $cliente->id);

        } catch (\Exception $e) {
            Log::error('Error al obtener el cliente para actualizar : ' . $e->getMessage());
            return response()->json(['error' => $e->getMessage()], 404);
        }

    }

    public function update(Request $request, string $id)
    {
        Log::info('Se ha pedido actualizar el cliente con id: ' . $id);
        $request->validate([
            'nombre' => 'required|string|max:255|min:3',
            'apellido' => 'required|string|max:255|min:3',
            'direccion' => 'required|string|max:255|min:3',
            'codigo_postal' => 'required|min:5|max:5|regex:/^[0-9]{5}$/',
        ]);
        Log::info('Se ha validado correctamente el cliente');
        try {
            $cliente = Clientes::find($id);
            if ($cliente == null || $cliente->isDeleted) {
                Log::error('No se ha encontrado el cliente con el id: ' . $id);
                return response()->json(['error' => 'No se ha encontrado el cliente'], 404);
            }
            Log::info('Se ha encontrado el cliente correctamente');
            $cliente->update($request->all());
            Log::info('Se va a actualizar el cliente con los siguientes datos: ' . json_encode($cliente));
            $cliente->save();
            Log::info('Se ha actualizado el cliente correctamente');
            return response()->json(['status' => 'ok', 'cliente' => $cliente]);
        } catch (\Exception $e) {
            Log::error('Error al actualizar el cliente: ' . $e->getMessage());
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    public function destroy(string $id)
    {
        try {
            $cliente = Clientes::find($id);
            if ($cliente == null) {
                Log::error('No se ha encontrado el cliente con el id: ' . $id);
                return response()->json(['error' => 'No se ha encontrado el cliente'], 404);
            }

            Log::info('Se ha encontrado el cliente correctamente');
            $cliente->delete();
            Log::info('Se ha eliminado el cliente correctamente');
            return response()->json(['status' => 'ok']);
        } catch (\Exception $e) {
            Log::error('Error al eliminar el cliente: ' . $e->getMessage());
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    public function removeSoft(string $id)
    {
        try {
            $cliente = Clientes::find($id);
            if ($cliente == null) {
                Log::error('No se ha encontrado el cliente con el id: ' . $id);
                return response()->json(['error' => 'No se ha encontrado el cliente'], 404);
            }
            Log::info('Se ha encontrado el cliente correctamente');
            $cliente->isDeleted = true;
            $cliente->save();
            Log::info('Se ha eliminado el cliente correctamente');
            return response()->json(['status' => 'ok']);
        } catch (\Exception $e) {
            Log::error('Error al eliminar el cliente: ' . $e->getMessage());
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }
}
