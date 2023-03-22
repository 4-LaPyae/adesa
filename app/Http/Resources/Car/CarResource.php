<?php

namespace App\Http\Resources\Car;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CarResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            "id"=>$this->id,
            "name"=>$this->name,
            "image_path"=>$this->image_path,
            "make_name"=>$this->make_name,
            "model_name"=>$this->model_name,
            "transmission"=>$this->transmission,
            "fuel_type"=>$this->fuel_type_name,
            "body_type"=>$this->body_type_name,
            "equipment"=>$this->equipment_name,
            "colour"=>$this->colour_name,
            "power_hp"=>$this->hp_value.'hp',
            "power_kw"=>$this->kw_value.'kw',
            "g_km"=>$this->g_km ?? null,
            "origin_country"=>$this->origin_country,
            "damage"=>$this->damage_name,
            "emission_standard"=>$this->standard,
            "auction_type"=>$this->auction_type_name,
            "seller"=>$this->seller_name,
            "x_time"=>$this->x_time,
            "vat_regime"=>$this->vat_regime,
            "first_registration"=>$this->registration,
            "engine_size"=>$this->engine_size.'cc',
            "price"=>'$'.$this->price
        ];
    }
}
