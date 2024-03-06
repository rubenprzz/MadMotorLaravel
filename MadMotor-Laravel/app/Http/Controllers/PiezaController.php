<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\Pieza;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PiezaController extends Controller
{
    public function index(Request $request)
    {
        $piezas = Pieza::search($request->search)->orderBy('id', 'asc')->paginate(3);
        return view('piezas.index')->with('piezas', $piezas);
    }

    public function show($id)
    {
        $pieza = Pieza::find($id);
        if ($pieza) {
            return view('piezas.show')->with('pieza', $pieza);
        } else {
            flash('Pieza no encontrado')->error();
            return redirect()->route('piezas.index');
        }
    }

    public function store()
    {
        $categorias = Categoria::where('is_deleted', 0)->orderBy('nombre', 'asc')->get();
        return view('piezas.create')->with('categorias', $categorias);
    }

    public function create(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nombre' => 'required|unique:piezas|max:255|min:3|string',
            'precio' => 'required|numeric|min:0.01',
            'cantidad' => 'required|integer|min:0',
            'category_id' => 'required|string'
        ], $this->messages());

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $pieza = new Pieza();
        $pieza->nombre = $request->nombre;
        $pieza->precio = $request->precio;
        $pieza->cantidad = $request->cantidad;
        $pieza->image = $pieza::$IMAGE_DEFAULT;
        $pieza->category_id = $request->category_id;
        $pieza->save();
        flash('Pieza creada correctamente')->success();
        return redirect()->route('piezas.index');
    }

    /*UPDATE*/
    public function edit($id)
    {
        $pieza = Pieza::find($id);
        if ($pieza) {
            $categorias = Categoria::all();
            return view('piezas.edit')->with('pieza', $pieza)->with('categorias', $categorias);
        } else {
            return response()->json(['message' => 'Pieza not found.'], 404);
        }
    }

    public function update(Request $request, $id)
    {
        $pieza = Pieza::find($id);
        if ($pieza) {
            $validator = Validator::make($request->all(), [
                'nombre' => 'max:255|min:3|string',
                'descripcion'=>'max:255|min:3|string',
                'precio' => 'numeric',
                'cantidad' => 'integer',
                'category_id' => 'string'
            ], $this->messages());

            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator)->withInput();
            }

            $pieza->nombre = $request->nombre;
            $pieza->precio = $request->precio;
            $pieza->cantidad = $request->cantidad;
            $pieza->category_id = $request->category_id;
            $pieza->save();
            flash('Pieza actualizado correctamente')->success();
            return redirect()->route('piezas.index');
        } else {
            flash('Pieza no encontrado')->error();
            return redirect()->route('piezas.index');
        }
    }

    public function editImage($id)
    {
        $pieza = Pieza::find($id);
        if ($pieza) {
            return view('piezas.image')->with('pieza', $pieza);
        } else {
            return response()->json(['message' => 'Pieza not found.'], 404);
        }
    }

    public function updateImage(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ], $this->messages());

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 400);
        }
        try {
            $pieza = Pieza::find($id);

            if (!$pieza) {
                return response()->json(['message' => 'Pieza not found.'], 404);
            }

            if ($pieza->image !== Pieza::$IMAGE_DEFAULT && Storage::exists($pieza->image)) {
                Storage::delete($pieza->image);
            }

            $image = $request->file('image');
            $filenombre= $image->getClientOriginalnombre();
            $fileToSave = time() . $filenombre;
            $image->storeAs('public/piezas', $fileToSave);
            $pieza->image = $fileToSave;

            $pieza->save();
            flash('Imagen actualizada correctamente')->success();
            return redirect()->route('piezas.index');
        } catch (Exception $e) {
            flash('Error al actualizar la imagen')->error();
            return redirect()->route('piezas.index');
        }
    }

    /*DELETE*/
    public function destroy($id)
    {
        $pieza = Pieza::find($id);
        if ($pieza) {
            $imagePath = 'public/public/piezas/' . $pieza->image;
            if ($pieza->image !== Pieza::$IMAGE_DEFAULT && Storage::exists($imagePath)) {
                Storage::delete($imagePath);
            }
            $pieza->delete();
            flash('Pieza eliminada correctamente')->success();
            return redirect()->route('piezas.index');
        } else {
            flash('Pieza no encontrada')->error();
            return redirect()->route('piezas.index');
        }
    }

    public function messages()
    {
        return [
            'nombre.required' => 'El nombre es obligatorio.',
            'nombre.unique' => 'El nombre ya está en uso.',
            'nombre.max' => 'El nombre es demasiado largo.',
            'nombre.min' => 'El nombre es demasiado corto.',
            'nombre.string' => 'El nombre debe ser una cadena de texto.',
            'precio.required' => 'El precio es obligatorio.',
            'precio.numeric' => 'El precio debe ser un número.',
            'precio.min' => 'El precio debe ser al menos 0.01.',
            'cantidad.required' => 'El cantidad es obligatorio.',
            'cantidad.integer' => 'El cantidad debe ser un número entero.',
            'cantidad.min' => 'El cantidad debe ser al menos 0.',
            'category_id.required' => 'La categoría es obligatoria.',
            'category_id.string' => 'La categoría debe ser una cadena de texto.',
            'image.image' => 'La imagen debe ser una imagen.',
            'image.mimes' => 'La imagen debe ser un archivo de tipo: jpeg, png, jpg, gif, svg.',
            'image.max' => 'La imagen no puede ser mayor de 2048 kilobytes.'
        ];
    }
}

