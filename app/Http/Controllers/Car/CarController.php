<?php

namespace App\Http\Controllers\Car;

use App\Http\Controllers\Controller;
use App\Http\Requests\Car\CarRequest;
use App\Http\Resources\Car\CarMakeResource;
use App\Http\Resources\Car\CarModelResource;
use App\Http\Resources\Car\CarResource;
use App\Http\Resources\Car\MakeModelResource;
use App\Models\Car;
use App\Models\CarMake;
use App\Models\CarModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CarController extends Controller
{
    public $make;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $auction = request()->has('auction_source') ? request()->get('auction_source') : null;
        $filter_auction = $auction == 'All Sources' ? null : 1 ;
        $filter_make_name = request()->has('make') ? request()->get('make') : null;
        $filter_model_name= request()->has('model') ? request()->get('model') : null;
        $filter_fuel_type= request()->has('fuel_type') ? request()->get('fuel_type') : null;
        $filter_transmission = request()->has('transmission') ? request()->get('transmission') : null;
        $model_name = is_null($filter_model_name) ? null : explode(',', $filter_model_name);
        $fuel_type_name = is_null( $filter_fuel_type) ? null : explode(',',  $filter_fuel_type);
        $transmission = is_null($filter_transmission) ? null : explode(',', $filter_transmission);
        // if($filter_make_name){
        //     $this->make = CarMake::
        //     where(function ($query) use ($filter_make_name){      
        //             $query->where('name',$filter_make_name);
        //         return $query;
        //     })
        //     ->get();
        // }

        $cars =  DB::table('cars')
            ->leftJoin('car_makes', 'cars.car_make_id', '=', 'car_makes.id')
            ->leftJoin('car_models', 'cars.car_model_id', '=', 'car_models.id')
            ->leftJoin('fuel_types','cars.fuel_type_id','fuel_types.id')
            ->select('cars.id', 'cars.name','cars.transmission', 'cars.car_make_id', 'car_makes.name as make_name',
             'car_models.name as model_name','fuel_types.name as fuel_type_name')
            ->when(function ($query) use ($filter_auction,$filter_make_name,
            $model_name,$fuel_type_name,$transmission) {
                
                if($filter_auction){
                    $query->where('auction_source',0);
                }
                if($filter_make_name){
                    $query->where('car_makes.name',$filter_make_name);
                }
                if($model_name){
                    $query->whereIn('car_models.name',$model_name);
                }

                if($fuel_type_name){
                    $query->whereIn('fuel_types.name',$fuel_type_name);
                }

                if($transmission){
                    $query->whereIn('transmission',$transmission);
                }
                return $query;
            })
            ->get();
        return response()->json([
            "error" => false,
            "message" => "Car Lists",
            "total" => $cars->count(),
            "data" =>CarResource::collection($cars),
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
    public function store(CarRequest $request)
    {
        $validator = $request->validated();
        $car = Car::create($validator);
        return response()->json([
            "error" => false,
            "message" => "Car-Make Created",
            "data" => $car
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Car $car)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Car $car)
    {
      
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Car $car)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Car $car)
    {
        //
    }
}
