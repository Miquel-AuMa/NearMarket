<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class OrderResource extends JsonResource
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
            'user_id' => $this->user_id,
            'delivery' => $this->delivery,
            'state' => $this->state,
            'request_date' => $this->request_date,
            'pickup_date' => $this->pickup_date,
            'annotations' => $this->annotations,
        ];
    }
}
