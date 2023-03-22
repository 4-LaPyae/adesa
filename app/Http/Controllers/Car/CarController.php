<?php

namespace App\Http\Controllers\Car;

use App\FileOperation\StoreImageCar;
use App\Http\Controllers\Controller;
use App\Http\Requests\Car\CarRequest;
use App\Http\Resources\Car\CarMakeResource;
use App\Http\Resources\Car\CarModelResource;
use App\Http\Resources\Car\CarResource;
use App\Http\Resources\Car\MakeModelResource;
use App\Models\Car;
use App\Models\CarMake;
use App\Models\CarModel;
use App\Models\Media;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CarController extends Controller
{
    private $any,$mileage_from,$mileage_to,$hp_from,$hp_to,
    $kw_from,$kw_to,$co2_from,$co2_to,$registration_from,$registration_to,
    $cc_from,$cc_to,$price_from,$price_to;
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
        $filter_power = request()->has('power') ? request()->get('power') : null;
        $filter_co2 = request()->has('co2') ? request()->get('co2'): null;
        $filter_country = request()->has('country') ? request()->get('country') : null;
        $filter_damage = request()->has('damage') ? request()->get('damage') : null;
        $filter_standard = request()->has('emission_standard') ? request()->get('emission_standard') : null;
        $filter_auction_type = request()->has('auction_type') ? request()->get('auction_type') : null;
        $filter_seller = request()->has('seller') ? request()->get('seller') : null;
        $x_time = request()->has('x_time') ? request()->get('x_time') : null;
        $vat_regime = request()->has('vat_regime') ? request()->get('vat_regime') : null;
        $filter_registration = request()->has('registration') ? request()->get('registration') : null;
        $filter_engine_size = request()->has('engine_size') ? request()->get('engine_size') : null;
        $filter_price = request()->has('price') ? request()->get('price') : null;
       // return $filter_engine_size;

        $filter_power ? $this->any = $filter_power : null;
            if( $this->any){
            if (str_contains( $this->any, 'hp')) {
                $hp = is_null( $this->any) ? null : explode(',', $this->any);
                $arr=[];
               foreach ($hp as $h){
                $str = substr($h, 0, -2);
                array_push($arr,$str);
               }
               $this->hp_from = $arr[0] == "A" ? 50 : $arr[0];
               $this->hp_to = $arr[1] == "A" ? 250 : $arr[1];

            }elseif (str_contains( $this->any, 'kw')) {
                    $kw = is_null( $this->any) ? null : explode(',', $this->any);
                    //return $kw;
                    $arr1=[];
                   foreach ($kw as $k){
                    
                    $str1 = substr($k, 0, -2);
                    //return $str1;
                    array_push($arr1,$str1);

                   }
                   $this->kw_from = $arr1[0] == "A" ? 25 : $arr1[0];
                   $this->kw_to = $arr1[1] == "A" ? 296 : $arr1[1];
            }else{
                $this->any = null;
            }
            
            }
        if($filter_engine_size){
            if (str_contains($filter_engine_size, 'cc')) {
                $cc = is_null( $filter_engine_size) ? null : explode(',', $filter_engine_size);
                $arr3=[];
               foreach ($cc as $c){
                $str = substr($c, 0, -2);
                array_push($arr3,$str);
               }
               $this->cc_from = $arr3[0] == "A" ? 500 :$arr3[0] ;
               $this->cc_to = $arr3[1] == "A" ? 4000 :$arr3[1] ;
            }else{
                $cc_any = is_null( $filter_engine_size) ? null : explode(',', $filter_engine_size);
                $this->cc_from = $cc_any[0] == "Any" ? 500 : $cc_any[0];
                $this->cc_to = $cc_any[1] == "Any" ? 4000 : $cc_any[1];
            }
           
           
        }
        //return (int)$this->cc_to ;

       
        //string to array
        $model_name = is_null($filter_model_name) ? null : explode(',', $filter_model_name);
        $fuel_type_name = is_null( $filter_fuel_type) ? null : explode(',',  $filter_fuel_type);
        $transmission = is_null($filter_transmission) ? null : explode(',', $filter_transmission);
        $body_type = is_null($filter_body_type) ? null : explode(',', $filter_body_type);
        $mileage = is_null($filter_mileage) ? null : explode(',', $filter_mileage);
        $equipment = is_null($filter_equipment) ? null : explode(',',$filter_equipment);
        $colour = is_null($filter_colour) ? null : explode(',',$filter_colour);
        $co2 = is_null($filter_co2) ? null : explode(',',$filter_co2);
        $country = is_null($filter_country) ? null : explode(',',$filter_country);
        $damage = is_null($filter_damage) ? null : explode(',',$filter_damage); 
        $standard = is_null($filter_standard) ? null : explode(',',$filter_standard); 
        $auction_type = is_null($filter_auction_type) ? null : explode(',',$filter_auction_type); 
        $seller = is_null($filter_seller) ? null : explode(',',$filter_seller);
        $registration = is_null($filter_registration) ? null : explode(',',$filter_registration);
        $price = is_null($filter_price) ? null : explode(',',$filter_price);
        //end

        if($mileage){
           $this->mileage_from = $mileage[0] == "Any" ? 50 : $mileage[0];
           $this->mileage_to = $mileage[1] == "Any" ? 200000 : $mileage[1];
        }
        if($co2){
            $this->co2_from = $co2[0] == "Any" ? 50 : $co2[0];
            $this->co2_to = $co2[1] == "Any" ? 200 : $co2[1];
        }
        if($registration){
            $this->registration_from = $registration[0] == "Any" ? 2014 : $registration[0];
            $this->registration_to = $registration[1] == "Any" ? 2023 : $registration[1];
        }
        //return $price;
        if($price){
            $this->price_from = $price[0] == "Any" ? 1000 : $price[0];
            $this->price_to = $price[1] == "Any" ? 50000 : $price[1];
        }
        $cars =  DB::table('cars')
            ->leftJoin('car_makes', 'cars.car_make_id', '=', 'car_makes.id')
            ->leftJoin('car_models', 'cars.car_model_id', '=', 'car_models.id')
            ->leftJoin('fuel_types','cars.fuel_type_id','fuel_types.id')
            ->leftJoin('body_types','cars.body_type_id','=','body_types.id')
            ->leftJoin('equipment','cars.equipment_id','=','equipment.id')
            ->leftJoin('damages','cars.damage_id','=','damages.id')
            ->leftJoin('auction_types','cars.auction_type_id','=','auction_types.id')
            ->leftJoin('sellers','cars.seller_id','=','sellers.id')
            ->leftJoin('media','cars.media_id','=','media.id')
            ->select('cars.id','media.path as image_path','cars.name','cars.transmission', 'cars.car_make_id', 'car_makes.name as make_name',
             'car_models.name as model_name','cars.mileage','cars.power_hp as hp_value','cars.power_kw as kw_value',
             'cars.co2_emission as g_km','fuel_types.name as fuel_type_name','body_types.name as body_type_name',
             'equipment.name as equipment_name','cars.colour as colour_name','cars.country as origin_country','cars.price',
             'damages.name as damage_name','cars.emission_standard as standard','auction_types.name as auction_type_name',
             'sellers.name as seller_name','cars.first_registration as registration','cars.x_time','cars.vat_regime','cars.engine_size')
            ->when(function ($query) use ($filter_auction,$filter_make_name,$seller,$vat_regime,$price,
                                            $model_name,$fuel_type_name,$transmission,$registration,
                                            $body_type,$mileage,$equipment,$co2,$x_time,$filter_engine_size,
                                            $colour,$country,$damage,$standard,$auction_type) {
                if($filter_auction){
                    $query->where('auction_source',0);
                }
                if($x_time){
                    $query->where('x_time',1);
                }
                if($vat_regime){
                    $query->where('vat_regime',1);
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
                    $query->whereIn('cars.colour',$colour);
                }
                if($this->any){
                    if(str_contains( $this->any, 'hp')){
                        $query->where([['power_hp','>=',(int)$this->hp_from],
                        ['power_hp','<=',(int)$this->hp_to]]); 
                    }else{
                        $query->where([['power_kw','>=',(int)$this->kw_from],
                        ['power_kw','<=',(int)$this->kw_to]]);   
                    }
                    
                }

                if($co2){
                    $query->where([['co2_emission','>=',(int)$this->co2_from],
                    ['co2_emission','<=',(int)$this->co2_to]]);
                }

                if($country){
                    $query->whereIn('cars.country',$country);
                }
                if($damage){
                    $query->whereIn('damages.id',$damage);
                }
                if($standard){
                    $query->whereIn('emission_standard',$standard);
                }
                if($auction_type){
                    $query->whereIn('auction_type_id',$auction_type);
                }
                if($seller){
                    $query->whereIn('sellers.name',$seller);
                }
                if($registration){
                    $query->where([['first_registration','>=',(int)$this->registration_from],
                    ['first_registration','<=',(int)$this->registration_to]]);
                }
                if($filter_engine_size){
                    $query->where([['engine_size','>=',(int)$this->cc_from],
                    ['engine_size','<=',(int)$this->cc_to]]);
                }

                if($price){
                    $query->where([['price','>=',(int)$this->price_from],
                    ['price','<=',(int)$this->price_to]]);
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
        //return Car::where('id',$car->id)->get();

         $c = DB::table('cars')
            ->where('cars.id',$car->id)
            ->leftJoin('car_makes', 'cars.car_make_id', '=', 'car_makes.id')
            ->leftJoin('car_models', 'cars.car_model_id', '=', 'car_models.id')
            ->leftJoin('fuel_types','cars.fuel_type_id','fuel_types.id')
            ->leftJoin('body_types','cars.body_type_id','=','body_types.id')
            ->leftJoin('equipment','cars.equipment_id','=','equipment.id')
            ->leftJoin('damages','cars.damage_id','=','damages.id')
            ->leftJoin('auction_types','cars.auction_type_id','=','auction_types.id')
            ->leftJoin('sellers','cars.seller_id','=','sellers.id')
            ->leftJoin('media','cars.media_id','=','media.id')
            ->select('cars.id','media.path as image_path','cars.name','cars.transmission', 'cars.car_make_id', 'car_makes.name as make_name',
             'car_models.name as model_name','cars.mileage','cars.power_hp as hp_value','cars.power_kw as kw_value',
             'cars.co2_emission as g_km','fuel_types.name as fuel_type_name','body_types.name as body_type_name',
             'equipment.name as equipment_name','cars.colour as colour_name','cars.country as origin_country','cars.price',
             'damages.name as damage_name','cars.emission_standard as standard','auction_types.name as auction_type_name',
             'sellers.name as seller_name','cars.first_registration as registration','cars.x_time','cars.vat_regime','cars.engine_size')
             ->get();
         
        return response()->json([
            "error"=>false,
            "message"=>"Car Detail",
            "data"=>CarResource::collection($c)
        ]);
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
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Car $car)
    {
        //
    }

    public function storeImage(Request $request){
        $validator = $request->validate([
            'car_id'=>'required',
            'car_profile'=>'required',
        ]);
        $image = $validator['car_profile'] ?? null;
        $car_id = $validator['car_id'] ?? null;
       if($image){

        $operation = new StoreImageCar($image,$car_id);
       $media = Media::create([
            "path"=>$operation->storeImage()
        ]);
        Car::where('id',$car_id)->update([
            "media_id"=>$media->id
        ]);

        return response()->json([
            "error"=>false,
            "message"=>"Car image store successfully"
        ]);
        
       }
 
       
    }
}
