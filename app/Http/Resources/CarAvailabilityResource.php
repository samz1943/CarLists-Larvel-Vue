<?php

namespace App\Http\Resources;

use App\Models\Car;
use Illuminate\Http\Resources\Json\JsonResource;

class CarAvailabilityResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        $car = Car::where('id', $this->id)->first();

        return [
            'car' => new CarResource($car),
            'start_at' => $this->start_at,
            'end_at' => $this->end_at,
        ];
    }
}
