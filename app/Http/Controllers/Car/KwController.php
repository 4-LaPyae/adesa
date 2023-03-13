<?php

namespace App\Http\Controllers\Car;

use App\Http\Controllers\Controller;
use App\Http\Requests\Car\HpKwRequest;
use App\Http\Requests\Car\HpRequest;
use App\Http\Requests\Car\KwRequest;
use App\Models\Kw;
use Illuminate\Http\Request;

class KwController extends Controller
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
        $kw = Kw::create($validator);
        return response()->json([
            "error"=>false,
            "message"=>"Kw created",
            "data"=>$kw
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Kw $kw)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Kw $kw)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Kw $kw)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Kw $kw)
    {
        //
    }
}
