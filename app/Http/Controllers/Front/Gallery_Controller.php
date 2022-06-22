<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Gallery;
use App\Models\PageContent;
use Illuminate\Http\Request;

class Gallery_Controller extends Controller
{
    public function ShowPage()
    {
        $gallery = Gallery::all();

        $section6 = PageContent::where('page_name', '=', 'homepage')->where('section_name', '=', 'section_6')->first();
        $section6 = empty($section6) ? null : json_decode($section6['content'], TRUE);

        $data = [
            '__title' => 'Galerie',
            'gallery' => $gallery,
            'homepage_gallery' => $section6['images'],
        ];


        return view('front.gallery', $data);
    }
}
