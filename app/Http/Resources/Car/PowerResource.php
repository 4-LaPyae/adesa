<?php

namespace App\Http\Resources\Car;

use App\Operation\HpKwOperation;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PowerResource extends JsonResource
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
            "value"=>$this->id == 1 ? objToArr($this->hps) : objToArr($this->kws)
        ]
        ;
    }
}
