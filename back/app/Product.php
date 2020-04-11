<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function shop()
    {
        return $this->belongsTo(Shop::class);
    }

    public static function makeOne(array $data)
    {
        $product = new Product();
        $product->category()->associate(Category::find($data['category_id']));
        $product->shop()->associate(Shop::find($data['shop_id']));
        $product->name = $data['name'];
        $product->description = $data['description'];
        $product->unity_price = $data['unity_price'];
        $product->available = $data['available'];
        $product->photo = $data['photo'];

        $product->save();

        $product->load('shop', 'category');

        return $product;
    }

    public function updateMe(array $data)
    {
        if (isset($data['category_id'])) {
            $this->category()->associate(Category::find($data['category_id']));
        }
        if (isset($data['shop_id'])) {
            $this->shop()->associate(Shop::find($data['shop_id']));
        }        
        $this->name = $data['name'] ?? $this->name;
        $this->description = $data['description'] ?? $this->description;
        $this->unity_price = $data['unity_price'] ?? $this->unity_price;
        $this->available = $data['available'] ?? $this->available;
        $this->photo = $data['photo'] ?? $this->photo;

        $this->save();

        $this->load('shop', 'category');

        return $this;
    }
}
