<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StoreCategoriesRequest;
use App\Http\Requests\UpdateCategoriesRequest;

class CategoriesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api', ['except' => ['index', 'show']]);
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $this->authorize('viewAny', Categories::class);
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
        $this->authorize('create', Categories::class);

        $validated = $request->validated();
        $validated['user_id'] = Auth::user()->id;
        $category = Categories::create($validated);

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
        $this->authorize('view', $categories);

        $category = Categories::findorfail($id);

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
    public function update(UpdateCategoriesRequest $request,Categories $category)
    {
        $this->authorize('update', $category);

        $validated = $request->validated();
        $category->update($validated);

        return response()->json([
            'status' => true,
            'message' => 'success updated category',
            'category' => $category
        ], 201);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Categories $category)
    {
        $this->authorize('delete', $category);

        $category->delete();

        return response()->json([
            'status' => true,
            'message' => 'success deleted category'
        ], 201);
    }
}
