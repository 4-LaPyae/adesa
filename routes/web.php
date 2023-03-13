<?php

use App\Http\Controllers\FileUploadController;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    #select * form cars where name = '118 ATTIVA'
        // $cars = DB::table('cars')
        //         ->where('name','118 ATTIVA')
        //         ->dd();
    # "select * from `cars` where `name` = ? and `car_make_id` = ?"
        // $cars = DB::table('cars')
        //         ->where('name','118 ATTIVA')
        //         ->where('car_make_id',1)
        //         ->dd();

        //next method
        // $cars = DB::table('cars')
        //         ->where([
        //             ['name','118 ATTIVA'],
        //             ['car_make_id',1]
        //         ])     
        //         ->get();
        //next method
        // $cars = DB::table('cars')
        //         ->where(function($query){
        //              $query->where([
        //                 ['name','118 ATTIVA'],
        //                 ['car_make_id',1]
        //             ]);
        //             return $query;
        //         })           
        //         ->get();
    #select name,count(*) as car_count from cars group by name order by car_count desc

    // $cars = DB::table('cars')
    //             ->select(['name',DB::row('count(*) As car_count')])
    //             ->groupBy('name')
    //             ->orderBy('car_count','desc')
    //             ->get();

    #select name from cars where car in ('118 ATTIVA') orderBy car_id desc;
    // $cars = DB::table('cars')
    //         ->select('id as car_id','name')
    //         ->whereIn('name',['118 ATTIVA','120D M SPORT'])
    //         ->orderBy('id','desc')
    //         ->get();
    #select id,name from cars where id BETWEEN 1 and 3 orderBy id desc;
//     $cars = DB::table('cars')
//             ->select('id','name')
//             ->whereNotBetween('id',[1,4])
//             ->orderBy('id','desc')
//             ->get();
//    return $cars;
});

Route::resource('file-upload',FileUploadController::class);
