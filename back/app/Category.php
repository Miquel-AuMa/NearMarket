<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public static function makeOne(array $data)
    {
        $category = new Category();
        $category->name = $data['name'];
        $category->description = $data['description'];

        $category->save();

        return $category;
    }

    public function updateMe(array $data)
    {
        $this->name = $data['name'] ?? $this->name;
        $this->description = $data['description'] ?? $this->description;

        $this->save();

        return $this;
    }
}
