<?php

namespace App\Http\Controllers\Car;

use App\Http\Controllers\Controller;
use App\Http\Requests\Car\FuelTypeRequest;
use App\Models\FuelType;
use Illuminate\Http\Request;

class FuelTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $fuel_types = FuelType::orderBy('id','desc')->get();
        return response()->json([
            "error"=>false,
            "message"=>"Car Fuel Type Lists",
            "data"=>$fuel_types
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
    public function store(FuelTypeRequest $request)
    {
        $validator = $request->validated();
        $fuel_type = FuelType::create($validator);
        return response()->json([
            "error"=>false,
            "message"=>"Car Fuel Type Created",
            "data"=>$fuel_type
            ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(FuelType $fuelType)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(FuelType $fuelType)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, FuelType $fuelType)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(FuelType $fuelType)
    {
        //
    }
}
