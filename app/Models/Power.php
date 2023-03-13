<?php

namespace App\Models;

use App\Traits\FillableTraits;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Power extends Model
{
    use HasFactory,FillableTraits;
    public function hps(){
        return $this->hasMany(Hp::class);
    }
    public function kws(){
        return $this->hasMany(Kw::class);
    }
}
