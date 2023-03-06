<?php

namespace App\Models;

use App\Traits\FillableTraits;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CarModel extends Model
{
    use HasFactory,FillableTraits;
    protected $with = ['cars'];
    public function cars(){
        return $this->hasMany(Car::class);
    }
}
