<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Shop extends Model
{
    protected $casts = [
        'delivery' => 'boolean',
        'schedule' => 'array'
    ];


    public function shopType()
    {
        return $this->belongsTo(ShopType::class);
    }

    public static function makeOne(array $data)
    {
        $shop = new Shop();
        $shop->shopType()->associate(ShopType::find($data['shop_type_id']));
        $shop->phone_number = $data['phone_number'];
        $shop->name = $data['name'];
        $shop->password = bcrypt($data['password']);
        $shop->address_line_1 = $data['address_line_1'];
        $shop->city = $data['city'];
        $shop->zip = $data['zip'];
        $shop->delivery = $data['delivery'] ?? 0;
        $shop->schedule = $data['schedule'] ?? null;

        $shop->save();

        $shop->load('shopType');

        return $shop;
    }

    public function updateMe(array $data)
    {
        if (isset($data['shop_type_id'])) {
            $this->shopType()->associate(ShopType::find($data['shop_type_id']));
        }

        $this->phone_number = $data['phone_number'] ?? $this->phone_number;
        $this->name = $data['name'] ?? $this->name;
        $this->password = isset($data['password'])
            ? bcrypt($data['password'])
            : $this->password;
        $this->address_line_1 = $data['address_line_1'] ?? $this->address_line_1;
        $this->city = $data['city'] ?? $this->city;
        $this->zip = $data['zip'] ?? $this->zip;
        $this->delivery = $data['delivery'] ?? $this->delivery;
        $this->schedule = $data['schedule'] ?? $this->schedule;

        $this->save();

        $this->load('shopType');

        return $this;
    }
}
