<?php

namespace App\Http\Controllers\Dashboard\EditPages;

use App\Http\Controllers\Controller;
use App\Models\PageContent;
use Illuminate\Http\Request;

class EditShop_Controller extends Controller
{
    public function ShowPage()
    {
        $content = PageContent::where('page_name', '=', 'shop')->where('section_name', '=', 'section_1')->first()['content'];

        $data = [
            '__title' => 'Section 1',
            'content' => json_decode($content, TRUE),
        ];

        return view('dashboard.edit-pages.shop.section-1', $data);
    }

    public function Insert(Request $request)
    {
        $content = json_encode([
            'top_title' => $request->top_title,
            'title' => $request->title,
            'description' => $request->description,
        ]);


//        return json_decode($content, TRUE);

        $created = PageContent::updateOrCreate(
            [
                'page_name' => 'shop',
                'section_name' => 'section_1',
            ],
            [
                'content' => $content,
            ]
        );

        return redirect()->route('admin.edit-pages.shop.section-1');
    }
}
