<?php

namespace App\Http\Controllers\Car;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Car\AutionTypeRequest;
use App\Http\Requests\Car\DamageRequest;
use App\Models\AuctionType;

class AuctionTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $auction_type = AuctionType::orderBy('id','asc')->get(['id','name']);
        return response()->json([
            "error"=>false,
            "message"=>"Damage Lists",
            "data"=>$auction_type
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
    public function store(AutionTypeRequest $request)
    {
        $validator = $request->validated();
        $auction_type = AuctionType::create($validator);
        return response()->json([
            "error"=>false,
            "message"=>"Auction Type created",
            "data"=>$auction_type
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
