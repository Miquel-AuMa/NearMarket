<?php

namespace App\Http\Controllers;

use App\Http\Requests\ImageRequest;
use App\Image;

class ImageController extends Controller
{

    public function store(ImageRequest $request)
    {
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = $image->getClientOriginalName() . date('Y-m-d-H-i-s');
            $image->move(public_path('images/'), $imageName);
        }

        return [
            'url' => url('images/' . $imageName)
        ]
    }
}
