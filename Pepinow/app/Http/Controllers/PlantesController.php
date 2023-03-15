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
        //
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
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Plantes $plantes)
    {
        //
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
    public function update(UpdatePlantesRequest $request, Plantes $plantes)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Plantes $plantes)
    {
        //
    }
}
