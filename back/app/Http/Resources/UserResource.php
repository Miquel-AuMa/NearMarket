<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
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
            'phone_number' => $this->phone_number,
            'name' => $this->name,
            'surname' => $this->surname,
            'type' => $this->type,
            'address_line_1' => $this->address,
            'city' => $this->city,
            'zip' => $this->postcode,
            'photo' => $this->photo,
            'token' => $this->createToken('near-market')->accessToken,
            'shop' => new ShopResource($this->whenLoaded('shop')),
        ];
    }
}
