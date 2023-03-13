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
            "make_name"=>$this->make_name,
            "model_name"=>$this->model_name,
            "transmission"=>$this->transmission,
            "fuel_type"=>$this->fuel_type_name,
            "body_type"=>$this->body_type_name,
            "equipment"=>$this->equipment_name,
            "colour"=>$this->colour_name,
            "power_hp"=>$this->hp_value.'hp',
            "power_kw"=>$this->kw_value.'kw'
        ];
    }
}
