<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\PageContent;
use Illuminate\Http\Request;

class Special_Controller extends Controller
{
    public function ShowPage()
    {


        $section2 = PageContent::where('page_name', '=', 'services')->where('section_name', '=', 'section_2')->first();
        $section2 = empty($section2) ? null : json_decode($section2->content, TRUE);

        $section3 = PageContent::where('page_name', '=', 'services')->where('section_name', '=', 'section_3')->first();
        $section3 = empty($section3) ? null : json_decode($section3->content, TRUE);


        $comments = PageContent::where('page_name', '=', 'services')->where('section_name', '=', 'section_6')->first();
        $comments = empty($comments) ? null : json_decode($comments->content, TRUE);


        $faqs = PageContent::where('page_name', '=', 'services')->where('section_name', '=', 'section_5')->first();
        $faqs = empty($faqs) ? null : json_decode($faqs->content, TRUE);


//        $section4 = PageContent::where('page_name', '=', 'services')->where('section_name', '=', 'section_4')->first();
//        $section4 = empty($section4) ? null : json_decode($section4->content, TRUE);

        $data = [
            '__title' => 'special Page',
            'comments' => $comments,
            'faqs' => $faqs,
            'section2' => $section2,
            'section3' => $section3,
        ];
        return view('front.special', $data);
    }
}
