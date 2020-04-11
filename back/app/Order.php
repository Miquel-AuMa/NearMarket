<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    public static function makeOne(array $data)
    {
        $order = new Order();
        $order->user()->associate(User::find($data['user_id']));
        $order->delivery = $data['delivery'];
        $order->state = $data['state'];
        $order->request_date = $data['request_date'];
        $order->pickup_date = $data['pickup_date'];
        $order->annotations = $data['annotations'];

        $order->save();

        $order->load('user');

        return $order;
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

     public function updateMe(array $data)
     {
         if (isset($data['user_id'])) {
             $this->user()->associate(User::find($data['user_id']));
         }

         $this->delivery = $data['delivery'] ?? $this->delivery;
         $this->state = $data['state'] ?? $this->state;
         $this->request_date = $data['request_date'] ?? $this->request_date;
         $this->pickup_date = $data['pickup_date'] ?? $this->pickup_date;
         $this->pickup_date = $data['pickup_date'] ?? $this->pickup_date;
         $this->annotations = $data['annotations'] ?? $this->annotations;

         $this->save();

         $this->load('user');

         return $this;
     }
}
