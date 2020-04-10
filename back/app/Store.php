<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Store extends Model
{
    protected $casts = [
        'delivery' => 'boolean',
        'schedule' => 'array'
    ];

    public static function makeOne(array $data)
    {
        $store = new Store();
        $store->storeType()->associate(StoreType::find($data['store_type_id']));
        $store->phone_number = $data['phone_number'];
        $store->name = $data['name'];
        $store->password = bcrypt($data['password']);
        $store->address_line_1 = $data['address_line_1'];
        $store->city = $data['city'];
        $store->zip = $data['zip'];

        $store->save();

        $store->load('storeType');

        return $store;
    }

    public function storeType()
    {
        return $this->belongsTo(StoreType::class);
    }

    public function updateMe(array $data)
    {
        if (isset($data['store_type_id'])) {
            $this->storeType()->associate(StoreType::find($data['store_type_id']));
        }

        $this->phone_number = $data['phone_number'] ?? $this->phone_number;
        $this->name = $data['name'] ?? $this->name;
        $this->password = isset($data['password'])
            ? bcrypt($data['password'])
            : $this->password;
        $this->address_line_1 = $data['address_line_1'] ?? $this->address_line_1;
        $this->city = $data['city'] ?? $this->city;
        $this->zip = $data['zip'] ?? $this->zip;

        $this->save();

        $this->load('storeType');

        return $this;
    }
}
