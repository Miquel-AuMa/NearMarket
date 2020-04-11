<?php

namespace App\Http\Resources;

use App\Shop;
use Illuminate\Http\Resources\Json\JsonResource;

class ShopTypeResource extends JsonResource
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
            'description' => $this->description,
            'shops' => ShopResource::collection($this->whenLoaded('shops')),
        ];
    }
}
