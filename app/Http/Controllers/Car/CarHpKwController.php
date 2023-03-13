<?php

namespace App\Http\Controllers\Car;

use App\Http\Controllers\Controller;
use App\Http\Requests\Car\HpKwRequest;
use App\Models\HpKw;
use Illuminate\Http\Request;

class CarHpKwController extends Controller
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
    public function store(HpKwRequest $request)
    {
        $validator = $request->validated();
        return $validator;
        $car = HpKw::create($validator);
        return response()->json([
            "error" => false,
            "message" => "Car-Make Created",
            "data" => $car
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(HpKw $hpKw)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(HpKw $hpKw)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, HpKw $hpKw)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(HpKw $hpKw)
    {
        //
    }
}
