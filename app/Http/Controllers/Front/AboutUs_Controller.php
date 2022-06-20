<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\PageContent;
use Illuminate\Http\Request;

class AboutUs_Controller extends Controller
{
    public function ShowPage()
    {
        $section1 = PageContent::where('page_name', '=', 'about-us')->where('section_name', '=', 'section_1')->first();
        $section1 = empty($section1) ? null : json_decode($section1->content, TRUE);
        $section2 = PageContent::where('page_name', '=', 'about-us')->where('section_name', '=', 'section_2')->first();
        $section2 = empty($section2) ? null : json_decode($section2->content, TRUE);

        $data = [
            '__title' => 'Uber Uns',
            'section1' => $section1,
            'section2' => $section2,
        ];
        return view('front.about-us', $data);
    }
}
