<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PersonResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'last_name' => $this->last_name,
            'age' => $this->age,
            'blood' => $this->blood,
            'born' => $this->born,
            'born_place' => $this->born_place,
            'cellphone' => $this->cellphone,
            'city' => $this->city,
            'country' => $this->country,
            'eye_color' => $this->eye_color,
            'father_name' => $this->father_name,
            'gender' => $this->gender,
            'height' => $this->height,
            'national_code' => $this->national_code,
            'religion' => $this->religion,
            'system_id' => $this->system_id,
            'weight' => $this->weight,
            'avatar' => $this->avatar,
        ];
    }
}
