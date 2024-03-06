<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Personal;

class PersonalController extends Controller
{
    public function index(Request $request) {
        try {
            $personals = Personal::search($request->search)->orderBy('id', 'asc')->paginate(10);
            return view('personal.index')->with('personals', $personals);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    public function show($id)
    {
        $personal = Personal::find($id);
        return view('personal.show')->with('personal', $personal);
    }

    public function create()
    {
        return view('personal.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'min:2|max:20|required',
            'apellidos' => 'min:5|max:100|required',
            'fechaNacimiento' => 'required',
            'dni' => 'min:9|max:9|required',
            'direccion' => 'min:5|max:200|required',
            'telefono' => 'min:9|max:12|required',
            'sueldo' => 'min:3|max:10|required',
            'iban' => 'min:20|max:20|required',
            'email' => 'required',
            'password' => 'min:8|required',
            'rol' => 'required',
        ]);
        try {
            $personal = new Personal($request->all());
            $personal->password = bcrypt($request->password);
            $personal->save();
            flash('Personal creado correctamente')->success()->important();
            return redirect()->route('personal.index');
        } catch (Exception $e) {
            flash('Error al crear el personal')->error()->important();
            return redirect()->back();
        }
    }

    public function edit($id)
    {
        $personal = Personal::find($id);
        return view('personal.edit')->with('personal', $personal);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'direccion' => 'min:5|max:200|required',
            'telefono' => 'min:9|max:12|required',
            'sueldo' => 'min:3|max:10|required',
            'iban' => 'min:20|max:20|required',
            'email' => 'required',
        ]);
        try {
            $personal = Personal::find($id);
            $personal->update($request->all());
            $personal->save();
            flash('Personal modificado correctamente')->warning()->important();
            return redirect()->route('personal.index');
        } catch (Exception $e) {
            flash('Error al modificar el personal')->error()->important();
            return redirect()->back();
        }
    }
}
