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
    private $make,$mileage_from,$mileage_to,$hp_from,$hp_to,$kw_from,$kw_to;
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
        $filter_body_type = request()->has('body_type') ? request()->get('body_type') : null;
        $filter_mileage = request()->has('mileage') ? request()->get('mileage') : null;
        $filter_equipment = request()->has('equipment') ? request()->get('equipment') : null;
        $filter_colour = request()->has('colour') ? request()->get('colour') : null;
        $filter_hp = request()->has('hp') ? request()->get('hp') : null;
        $filter_kw = request()->has('kw') ? request()->get('kw') : null;
        //string to array
        $model_name = is_null($filter_model_name) ? null : explode(',', $filter_model_name);
        $fuel_type_name = is_null( $filter_fuel_type) ? null : explode(',',  $filter_fuel_type);
        $transmission = is_null($filter_transmission) ? null : explode(',', $filter_transmission);
        $body_type = is_null($filter_body_type) ? null : explode(',', $filter_body_type);
        $mileage = is_null($filter_mileage) ? null : explode(',', $filter_mileage);
        $equipment = is_null($filter_equipment) ? null : explode(',',$filter_equipment);
        $colour = is_null($filter_colour) ? null : explode(',',$filter_colour);
        $hp = is_null($filter_hp) ? null : explode(',',$filter_hp);
        $kw = is_null($filter_kw) ? null : explode(',',$filter_kw);
        //return $kw;
        //end
        if($mileage){
           $this->mileage_from = $mileage[0] == "Any" ? 50 : $mileage[0];
           $this->mileage_to = $mileage[1] == "Any" ? 200000 : $mileage[1];
        }
        if($hp){
            $this->hp_from = $hp[0] == "Any" ? 50 : $hp[0];
           $this->hp_to = $hp[1] == "Any" ? 250 : $hp[1];
        }
        if($kw){
            $this->kw_from = $kw[0] == "Any" ? 25 : $kw[0];
           $this->kw_to = $kw[1] == "Any" ? 296 : $kw[1];
        }

        $cars =  DB::table('cars')
            ->leftJoin('car_makes', 'cars.car_make_id', '=', 'car_makes.id')
            ->leftJoin('car_models', 'cars.car_model_id', '=', 'car_models.id')
            ->leftJoin('fuel_types','cars.fuel_type_id','fuel_types.id')
            ->leftJoin('body_types','cars.body_type_id','=','body_types.id')
            ->leftJoin('equipment','cars.equipment_id','=','equipment.id')
            ->leftJoin('colours','cars.colour_id','=','colours.id')
            ->select('cars.id', 'cars.name','cars.transmission', 'cars.car_make_id', 'car_makes.name as make_name',
             'car_models.name as model_name','cars.mileage','cars.power_hp as hp_value','cars.power_kw as kw_value',
             'fuel_types.name as fuel_type_name','body_types.name as body_type_name',
             'equipment.name as equipment_name','colours.name as colour_name')
            ->when(function ($query) use ($filter_auction,$filter_make_name,
                                            $model_name,$fuel_type_name,$transmission,
                                            $body_type,$mileage,$equipment,
                                            $colour,$hp,$kw) {
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
                if($body_type){
                    $query->whereIn('body_types.name',$body_type);
                }
                if($mileage){
                    $query->where([['mileage','>=',(int)$this->mileage_from],
                                ['mileage','<=',(int)$this->mileage_to]]);            
                }
                if($equipment){
                    $query->whereIn('equipment.name',$equipment);
                }
                if($colour){
                    $query->whereIn('colours.name',$colour);
                }
                if($hp){
                    $query->where([['power_hp','>=',(int)$this->hp_from],
                    ['power_hp','<=',(int)$this->hp_to]]); 
                }

                if($kw){
                    $query->where([['power_kw','>=',(int)$this->kw_from],
                    ['power_kw','<=',(int)$this->kw_to]]);
                }
                return $query;
            })
            ->get();
            //return $cars;
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
