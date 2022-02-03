<?php

namespace App\Http\Resources;

use App\Models\Car;
use Illuminate\Http\Resources\Json\JsonResource;

class UserProfileResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        $cars = Car::where('user_id', $this->id)->get();

        return [
            'id' => $this->id,
            'name' => $this->name,
            'verified' => $this->verified,
            'product_manager' => $this->product_manager,
            'cars' => CarResource::collection($cars)
        ];
    }
}
