<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
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
            'category_id' => $this->category_id,
            'shop_id' => $this->shop_id,
            'name' => $this->name,
            'description' => $this->description,
            'unity_price' => $this->unity_price,
            'available' => $this->available,
            'photo' => $this->photo,
        ];
    }
}