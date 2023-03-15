<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use App\Http\Requests\StoreCategoriesRequest;
use App\Http\Requests\UpdateCategoriesRequest;

class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Categories::get();
        return response()->json([
            'status' => 'success',
            'categories' => $categories
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCategoriesRequest $request)
    {
        $category = Categories::create([
            'name' => $request->name,
        ]);

        return response()->json([
            'status' => true,
            'message' => 'success created category',
            'category' => $category
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Categories $categories,$id)
    {
        $category = Categories::find($id);

        return response()->json([
            'status' => true,
            'message' => 'success created category',
            'category' => $category
        ], 201);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Categories $categories)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCategoriesRequest $request, Categories $categories,$id)
    {
        $category = Categories::find($id)->update([
            'name' => $request->name
        ]);

        return response()->json([
            'status' => true,
            'message' => 'success updated category',
            'category' => $category
        ], 201);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Categories $categories,$id)
    {
        $category = Categories::find($id)->delete();

        return response()->json([
            'status' => true,
            'message' => 'success deleted category'
        ], 201);
    }
}
