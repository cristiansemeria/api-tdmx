<?php

namespace App\Http\Controllers;

use App\Models\Hotel;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HotelController extends Controller
{
    public function index()
    {
        try {
            $hoteles = Hotel::get();
            return response()->json($hoteles);
        } catch (ModelNotFoundException $e) {
            return response()->json(['message' => 'Hotel not found'], 404);
        }
    }

    public function store(Request $request)
    {
        $hotel = new Hotel();
        $hotel->name = $request->name;
        $hotel->address = $request->address;
        $hotel->description = $request->description;
        $hotel->services = $request->services;
        $hotel->destino_id = $request->destino_id;
        $hotel->google_maps = $request->google_maps;
        $hotel->price = $request->price;
        $hotel->active = $request->active;
        $hotel->save();
        return response()->json($hotel);
    }

    public function show(string $id)
    {
        try {
            $hotel = Hotel::findOrFail($id);
            return response()->json($hotel);

        } catch (ModelNotFoundException $e) {
            return response()->json([
                'message' => 'El hotel seleccionado no existe'
            ], 404);
        }
    }

    public function update(Request $request, string $id)
    {
        try {
            $hotel = Hotel::findOrFail($id);
            $hotel->name = $request->name;
            $hotel->address = $request->address;
            $hotel->description = $request->description;
            $hotel->services = $request->services;
            $hotel->images = $request->images;
            $hotel->destino_id = $request->destino_id;
            $hotel->price = $request->price;
            $hotel->google_maps = $request->google_maps;
            $hotel->active = $request->active;
            $hotel->reviews = $request->reviews;
            $hotel->save();
            return response()->json($hotel);
        } catch (ModelNotFoundException $e) {
            return response()->json([
                'message' => 'El hotel seleccionado no existe'
            ], 404);
        }
    }

    public function destroy(string $id)
    {
        Hotel::destroy($id);
        return response()->json(['message' => 'Deleted']);
    }

    public function getHotelBySlug(string $slug) {
        $hotel = Hotel::where('slug', $slug)
            ->with('teams')
            ->firstOrFail();
        return response()->json($hotel);
    }
}
