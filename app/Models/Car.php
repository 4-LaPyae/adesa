<?php

namespace App\Models;

use App\Traits\FillableTraits;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    use HasFactory,FillableTraits;
    //protected $with = ['make','model'];
    public function make(){
        return $this->belongsTo(CarMake::class,'car_make_id','id');
    }

    public function model(){
        return $this->belongsTo(CarModel::class,'car_model_id','id');
    }

}
