<?php

namespace App\Http\Controllers;

use App\Models\ServiciosCategoria;
use Illuminate\Http\Request;

class ServicioCategoriaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categorias = ServiciosCategoria::get();
        return response()->json($categorias);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $categoria = new ServiciosCategoria();
        $categoria->name = $request->name;
        $categoria->icon = $request->icon;
        $categoria->save();
        return response()->json($categoria);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
