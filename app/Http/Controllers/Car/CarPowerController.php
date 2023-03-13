<?php

namespace App\Http\Controllers\Car;

use App\Http\Controllers\Controller;
use App\Http\Requests\Car\PowerRequest;
use App\Http\Resources\Car\PowerResource;
use App\Models\Power;
use Illuminate\Http\Request;

class CarPowerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $powers = Power::orderBy('id','asc')->get();
        return response()->json([
            "error"=>false,
            "message"=>"Power Lists",
            "data"=>$powers
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
    public function store(PowerRequest $request)
    {
        $validator = $request->validated();
        $power = Power::create($validator);
        return response()->json([
            "error"=>false,
            "message"=>"Car Power Created",
            "data"=>$power
            ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Power $power)
    {
        //return $power;
        return response()->json([
            "error"=>false,
            "message"=>"Power Detail",
            "data"=>new PowerResource($power)
           ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Power $power)
    {
        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Power $power)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Power $power)
    {
        //
    }
}
