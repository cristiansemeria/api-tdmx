<?php

namespace App\Http\Controllers;

use App\Models\Destinos;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;

class DestinoController extends Controller
{
    public function index()
    {
        $destinos = Destinos::get();
        return response()->json($destinos);
    }

    public function store(Request $request)
    {
        $destino = new Destinos();
        $destino->name = $request->name;
        $destino->state = $request->state;
        $destino->description = $request->description;
        $destino->save();
        return response()->json($destino);
    }

    public function show(string $id)
    {
        try {
            $destino = Destinos::findOrFail($id);
            return response()->json($destino);

        } catch (ModelNotFoundException $e) {
            return response()->json([
                'message' => 'El destino seleccionado no existe'
            ], 404);
        }
    }

    public function update(Request $request, string $id)
    {
        try {
            $destino = Destinos::findOrFail($id);
            $destino->name = $request->name;
            $destino->state = $request->state;
            $destino->description = $request->description;
            $destino->save();
            return response()->json($destino);
        } catch (ModelNotFoundException $e) {
            return response()->json([
                'message' => 'El destino seleccionado no existe'
            ], 404);
        }
    }

    public function destroy(string $id)
    {
        Destinos::destroy($id);
        return response()->json(['message' => 'Deleted']);
    }
}
