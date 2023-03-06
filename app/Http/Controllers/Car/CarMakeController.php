<?php

namespace App\Http\Controllers\Car;

use App\Http\Controllers\Controller;
use App\Http\Requests\Car\CarMakeRequest;
use App\Http\Resources\Car\CarMakeResource;
use App\Http\Resources\Car\CarModelResource;
use App\Http\Resources\Car\MakeModelResource;
use App\Models\CarMake;
use Illuminate\Http\Request;

class CarMakeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $car_makes = CarMake::orderBy('id','asc')->get();
        return response()->json([
            "error"=>false,
            "message"=>"Car-Make Lists",
            "data"=>CarMakeResource::collection($car_makes)
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
    public function store(CarMakeRequest $request)
    {
        $validator = $request->validated();
        $car_make = CarMake::create($validator);
        return response()->json([
        "error"=>false,
        "message"=>"Car-Make Created",
        "data"=>$car_make
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(CarMake $carmake)
    {
       return response()->json([
        "error"=>false,
        "message"=>"Car Make Detail",
        "total"=>$carmake->cars->count(),
        "data"=>new MakeModelResource($carmake)
       ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(CarMake $carMake)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, CarMake $carMake)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(CarMake $carMake)
    {
        //
    }

    public function searchCarMakes(Request $request){
        $filter_name = $request->has('filter_name') ? $request->get('filter_name') : null;
        
        $query = CarMake::where(function ($query) use ($filter_name){
            if($filter_name){
                $query->where("name",'LIKE','%'.$filter_name.'%');
            }
            return $query;
        });
        $total = $query->count();
        $car_makes = $query->get();
        return response()->json([
            "error"=>false,
            "message"=>"Search Car-Make Lists",
            "total"=>$total,
            "data"=>CarMakeResource::collection($car_makes)
            ]);
        return ;
    }
}
