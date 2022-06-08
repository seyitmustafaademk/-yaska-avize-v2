<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\PageContent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Homepage_Controller extends Controller
{
    public function ShowPage()
    {
        $section1 = PageContent::where('page_name', '=', 'homepage')->where('section_name', '=', 'section_1')->first();
        $section1 = empty($section1) ? null : json_decode($section1['content'], TRUE);

        $section2 = PageContent::where('page_name', '=', 'homepage')->where('section_name', '=', 'section_2')->first();
        $section2 = empty($section2) ? null : json_decode($section2['content'], TRUE);

        $section3 = PageContent::where('page_name', '=', 'homepage')->where('section_name', '=', 'section_3')->get();

        $section4 = DB::select("
            SELECT 
                p.id AS p_id, p.title, p.category, p.materials, p.negotiable, p.date_of_manufacture, p.slug, p.cargo_price, p.cargo_time, p.images,
                pd.id as pd_id, pd.diameter, pd.height, pd.weight, pd.list_price, pd.primary_image,
                pc.id
            FROM
                page_contents pc
                
            JOIN product_details pd
            ON pd.id = pc.content
            JOIN products p
            ON p.id = pd.product_id");

        $section5 = PageContent::where('page_name', '=', 'homepage')->where('section_name', '=', 'section_5')->first();
        $section5 = empty($section5) ? null : json_decode($section5['content'], TRUE);

        $section6 = PageContent::where('page_name', '=', 'homepage')->where('section_name', '=', 'section_6')->first();
        $section6 = empty($section6) ? null : json_decode($section6['content'], TRUE);

        $section9 = PageContent::where('page_name', '=', 'homepage')->where('section_name', '=', 'section_9')->first();
        $section9 = empty($section9) ? null : json_decode($section9['content'], TRUE);

        $data = [
            '__title' => 'Kron-Leucher',
            'section1' => $section1,
            'section2' => $section2,
            'section3' => $section3,
            'section4' => $section4,
            'section5' => $section5,
            'section6' => $section6,
            'section9' => $section9,
        ];
        return view('front.homepage', $data);
    }
}
