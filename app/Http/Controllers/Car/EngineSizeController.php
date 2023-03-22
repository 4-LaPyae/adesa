<?php

namespace App\Http\Controllers\Car;

use App\Http\Controllers\Controller;
use App\Http\Requests\Car\EngineSizeRequest;
use App\Http\Resources\Car\EngineSizeResource;
use App\Models\EngineSize;
use Illuminate\Http\Request;

class EngineSizeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $engine = EngineSize::orderBy('id','asc')->get(['id','value']);
        return response()->json([
            "error"=>false,
            "message"=>"Engine Size Lists",
            "data"=>engineObjToArr($engine)
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
    public function store(EngineSizeRequest $request)
    {
        $validator = $request->validated();
        $engine = EngineSize::create($validator);
        return response()->json([
            "error"=>false,
            "message"=>"Engine Size created",
            "data"=>$engine
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
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
