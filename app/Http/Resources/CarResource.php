<?php

namespace App\Http\Resources;

use App\Models\User;
use Illuminate\Http\Resources\Json\JsonResource;

class CarResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'brand' => $this->brand,
            'build' => $this->build,
            'year' => $this->year,
            'mode' => $this->mode,
            'geolocation' => $this->geolocation,
            'price' => $this->price,
            $this->mergeWhen($this->name != null, [
                'owner' => [
                    'id' => $this->user_id,
                    'name' => $this->name
                ]
            ])
        ];
    }
}
