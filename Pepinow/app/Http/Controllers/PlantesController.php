<?php

namespace App\Http\Controllers;

use App\Models\Plantes;
use App\Http\Requests\StorePlantesRequest;
use App\Http\Requests\UpdatePlantesRequest;

class PlantesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $plantes = Plantes::get();
        return response()->json([
            'status' => 'success',
            'plantes' => $plantes
        ]);
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
    public function store(StorePlantesRequest $request)
    {
        $plantes = Plantes::create([
            'name' => $request->name,
            'scientific_name' => $request->scientific_name,
            'family' => $request->family,
            'genus' => $request->genus,
            'height' => $request->height,
            'origin' => $request->origin,
            'quantity' => $request->quantity,
            'category_id' => $request->category_id,
        ]);

        return response()->json([
            'status' => true,
            'message' => 'success created plant',
            'plant' => $plantes
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Plantes $plantes,$id)
    {
        $plant = Plantes::find($id);

        return response()->json([
            'status' => true,
            'message' => 'success created plant',
            'plant' => $plant
        ], 201);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Plantes $plantes)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePlantesRequest $request, Plantes $plantes,$id)
    {
        $plant = Plantes::find($id)->update([
            'name' => $request->name
        ]);

        return response()->json([
            'status' => true,
            'message' => 'success updated plant',
            'plant' => $plant
        ], 201);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Plantes $plantes,$id)
    {
        $plant = Plantes::find($id)->delete();

        return response()->json([
            'status' => true,
            'message' => 'success deleted plant'
        ], 201);
    }
}
