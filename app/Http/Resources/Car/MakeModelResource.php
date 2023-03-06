<?php

namespace App\Http\Resources\Car;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class MakeModelResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request)
    {
            return [
                "id"=>$this->id,
                "name"=>$this->name,
                "models"=>CarModelResource::collection($this->models)
            ]; 
    }
}
