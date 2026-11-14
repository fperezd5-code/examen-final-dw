<?php

namespace App\Http\Controllers;

use App\Models\Vehiculo;
use Illuminate\Http\Request;

class VehiculoController extends Controller
{
    private function reglas(): array
    {
        return [
            'marca'  => 'required|string|max:50',
            'modelo' => 'required|string|max:50',
            'anio'   => 'required|integer|min:1900|max:' . (date('Y') + 1),
            'color'  => 'required|string|max:30',
        ];
    }

    public function index()
    {
        return response()->json(Vehiculo::all());
    }

    public function store(Request $request)
    {
        $vehiculo = Vehiculo::create($request->validate($this->reglas()));
        return response()->json($vehiculo, 201);
    }

    public function show(Vehiculo $vehiculo)
    {
        return response()->json($vehiculo);
    }

    public function update(Request $request, Vehiculo $vehiculo)
    {
        $vehiculo->update($request->validate($this->reglas()));
        return response()->json($vehiculo);
    }

    public function destroy(Vehiculo $vehiculo)
    {
        $vehiculo->delete();
        return response()->json(['message' => 'Vehiculo eliminado']);
    }
}
