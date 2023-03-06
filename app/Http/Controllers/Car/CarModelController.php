<?php

namespace App\Http\Controllers\Car;

use App\Http\Controllers\Controller;
use App\Http\Requests\Car\CarModelRequest;
use App\Http\Resources\Car\CarModelResource;
use App\Models\CarModel;
use Illuminate\Http\Request;

class CarModelController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $car_models = CarModel::orderBy('id','asc')->get();
        return response()->json([
            "error"=>false,
            "message"=>"Car-Model Lists",
            "total"=>$car_models->count(),
            "data"=>CarModelResource::collection($car_models)
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
    public function store(CarModelRequest $request)
    {
        $validator = $request->validated();
        $car_model = CarModel::create($validator);
        return response()->json([
            "error"=>false,
            "message"=>"Car-Model Created",
            "data"=>$car_model
            ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(CarModel $carModel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(CarModel $carModel)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, CarModel $carModel)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(CarModel $carModel)
    {
        //
    }

    public function searchCarModels(Request $request){
        $filter_name = $request->has('filter_name') ? $request->get('filter_name') : null;
        
        $query = CarModel::where(function ($query) use ($filter_name){
            if($filter_name){
                $query->where("name",'LIKE','%'.$filter_name.'%');
            }
            return $query;
        });
        $total = $query->count();
        $car_models = $query->get();
        return response()->json([
            "error"=>false,
            "message"=>"Search Car-Model Lists",
            "total"=>$total,
            "data"=>CarModelResource::collection($car_models)
            ]);
        return ;
    }
}
