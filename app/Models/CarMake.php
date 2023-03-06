<?php

namespace App\Models;

use App\Traits\FillableTraits;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CarMake extends Model
{
    use HasFactory,FillableTraits;
    protected $with=['models'];
    public function models(){
        return $this->hasMany(CarModel::class);
    }

    public function cars(){
        return $this->hasMany(Car::class);
    }
}
