<?php

namespace App\Http\Controllers\Car;

use App\Http\Controllers\Controller;
use App\Http\Requests\Car\HpKwRequest;
use App\Http\Requests\Car\HpRequest;
use App\Models\Hp;
use Illuminate\Http\Request;

class HpController extends Controller
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
        $hp = Hp::create($validator);
        return response()->json([
            "error"=>false,
            "message"=>"Hp created",
            "data"=>$hp
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Hp $hp)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Hp $hp)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Hp $hp)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Hp $hp)
    {
        //
    }
}
