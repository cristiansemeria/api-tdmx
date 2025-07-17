<?php

namespace App\Http\Controllers;
use App\Models\ServiciosCategoria;
use App\Models\ServiciosSubcategoria;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;

class ServicioSubcategoriaController extends Controller
{
    public function index()
    {
        $subcategorias = ServiciosSubcategoria::get();
        return response()->json($subcategorias);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'categoria_id' => 'required|integer',
        ]);
        try {
            ServiciosCategoria::findOrFail($validated['categoria_id']);
            $subcategoria = new ServiciosSubcategoria();
            $subcategoria->name = $request->name;
            $subcategoria->categoria_id = $request->categoria_id;
            $subcategoria->save();
            return response()->json($subcategoria);
        } catch (ModelNotFoundException $e) {
            return response()->json([
                'message' => 'Error 404'
            ], 404);
        }

    }

    public function show(string $id)
    {
        try {
            $subcategoria = ServiciosSubcategoria::findOrFail($id);
            return response()->json($subcategoria);

        } catch (ModelNotFoundException $e) {
            return response()->json([
                'message' => 'La Subcategoria seleccionado no existe'
            ], 404);
        }
    }

    public function update(Request $request, string $id)
    {
        try {
            $subcategoria = ServiciosSubcategoria::findOrFail($id);
            $subcategoria->name = $request->name;
            $subcategoria->categoria_id = $request->categoria_id;
            $subcategoria->save();
            return response()->json($subcategoria);
        } catch (ModelNotFoundException $e) {
            return response()->json([
                'message' => 'La Subcategoria seleccionado no existe'
            ], 404);
        }
    }

    public function destroy(string $id)
    {
        ServiciosSubcategoria::destroy($id);
        return response()->json(['message' => 'Subcategoria eliminada']);
    }
}
