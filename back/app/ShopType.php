<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ShopType extends Model
{
    protected $casts = [
        'delivery' => 'boolean',
        'schedule' => 'array'
    ];

    public function shops()
    {
        return $this->hasMany(Shop::class);
    }

    public static function makeOne(array $data)
    {
        $shopType = new ShopType();
        $shopType->name = $data['name'];
        $shopType->description = $data['description'];

        $shopType->save();

        $shopType->load('shops');

        return $shopType;
    }

    public function updateMe(array $data)
    {
        $this->name = $data['name'] ?? $this->name;
        $this->description = $data['description'] ?? $this->description;
        $this->save();

        $this->load('shops');

        return $this;
    }
}
