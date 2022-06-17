<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Gallery;
use Illuminate\Http\Request;

class Gallery_Controller extends Controller
{
    public function ShowPage()
    {
        $gallery = Gallery::all();

        $data = [
            '__title' => 'Galerie',
            'gallery' => $gallery,
        ];

        return view('front.gallery', $data);
    }
}
