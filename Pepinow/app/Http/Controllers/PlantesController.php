<?php

namespace App\Http\Controllers;

use App\Models\Plantes;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StorePlantesRequest;
use App\Http\Requests\UpdatePlantesRequest;

class PlantesController extends Controller
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
        $this->authorize('viewAny', Plantes::class);

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
        $this->authorize('create', Plantes::class);

        // 'name','description','image','prix','category_id'
        $image = $request->file('image');
        $name_gen = hexdec(uniqid());
        $img_ext = strtolower($image->getClientOriginalExtension());
        $img_name = $name_gen.'.'.$img_ext;
        $location = 'img/Plants/';
        $last_img = $location.$img_name;
        $image->move($location,$img_name);
        

        $plantes = Plantes::create([
            'name' => $request->name,
            'description' => $request->description,
            'image' => $last_img,
            'prix' => $request->prix,
            'category_id' => $request->category_id,
            'user_id' => Auth::user()->id,
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
        $this->authorize('view', $plantes);

        $plant = Plantes::findorfail($id);

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
    public function update(UpdatePlantesRequest $request, Plantes $plant,$id)
    {
        $plant = Plantes::findorfail($id);

        $this->authorize('update', $plant);

        $image = $request->file('image');
        if($image == null){
            $plant->update([
                'name' => $request->name,
                'description' => $request->description,
                'prix' => $request->prix,
                'category_id' => $request->category_id,
            ]);
    
            return response()->json([
                'status' => true,
                'message' => 'success updated plant',
                'plant' => $plant
            ], 201);
        }else{
            $name_gen = hexdec(uniqid());
            $img_ext = strtolower($image->getClientOriginalExtension());
            $img_name = $name_gen.'.'.$img_ext;
            $location = 'img/Plants/';
            $last_img = $location.$img_name;
            $image->move($location,$img_name);

            $plant->update([
                'name' => $request->name,
                'description' => $request->description,
                'prix' => $request->prix,
                'image' => $last_img,
                'category_id' => $request->category_id,
            ]);
    
            return response()->json([
                'status' => true,
                'message' => 'success updated plant',
                'plant' => $plant
            ], 201);
        }

        

        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Plantes $plant,$id)
    {
        
        $plant = Plantes::findorfail($id);
        $this->authorize('delete', $plant);
        $plant->delete();
        // Plantes::findorfail($id)->delete();

        return response()->json([
            'status' => true,
            'message' => 'success deleted plant'
        ], 201);
    }
}
