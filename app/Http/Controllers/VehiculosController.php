<?php

namespace App\Http\Controllers;

use App\Models\vehiculos;
use Illuminate\Http\Request;

class VehiculosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $vehiculos = vehiculos::all();
        return view('vehiculos.index', compact('vehiculos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'numero_placa' => 'required|string|max:15|min:3|unique:vehiculos',
            'marca' => 'required|string|max:50|min:3',
            'modelo' => 'required|string|max:80|min:3',
            'tipo_vehiculo' => 'required|string|max:50|min:3',
            'color' => 'required|string|max:30|min:3',
            'capacidad' => 'required|integer|min:1',
            'tarifa_diaria' => 'required|decimal:2|min:0',
            'estado' => 'required|string|max:30|min:3',
        ]);

        vehiculos::create($validated);

        return redirect()->route('vehiculos.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(vehiculos $vehiculos)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(vehiculos $vehiculos)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, vehiculos $vehiculos)
    {
        $validated = $request->validate([
            'numero_placa' => 'required|string|max:15|min:3|unique:vehiculos,numero_placa,' . $vehiculos->id,
            'marca' => 'required|string|max:50|min:3',
            'modelo' => 'required|string|max:80|min:3',
            'tipo_vehiculo' => 'required|string|max:50|min:3',
            'color' => 'required|string|max:30|min:3',
            'capacidad' => 'required|integer|min:1',
            'tarifa_diaria' => 'required|decimal:2|min:0',
            'estado' => 'required|string|max:30|min:3',
        ]);

        $vehiculos->update($validated);

        return redirect()->route('vehiculos.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(vehiculos $vehiculos)
    {
        $vehiculos->delete();

        return redirect()->route('vehiculos.index')->with('success', 'Vehículo eliminado correctamente');
    }
}
