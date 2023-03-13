<?php

namespace App\Http\Controllers\Car;

use App\Http\Controllers\Controller;
use App\Http\Requests\Car\BodyTypeRequest;
use App\Models\BodyType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BodyTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        
       
        $body_types = BodyType::orderBy('id','asc')->get();
        $arr = [];
        foreach ($body_types as $item){
            //return $item->name;
            array_push($arr,$item->name);
        }
        return $arr;
        return response()->json([
            "error"=>false,
            "message"=>"Car Body Type Lists",
            "data"=>$body_types
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
    public function store(BodyTypeRequest $request)
    {
        $validator = $request->validated();
        $body_type = BodyType::create($validator);
        return response()->json([
            "error"=>false,
            "message"=>"Car Body Type Created",
            "data"=>$body_type
            ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(BodyType $bodyType)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(BodyType $bodyType)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, BodyType $bodyType)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(BodyType $bodyType)
    {
        //
    }
}
