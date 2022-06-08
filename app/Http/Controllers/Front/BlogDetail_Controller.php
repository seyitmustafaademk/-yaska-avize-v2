<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BlogDetail_Controller extends Controller
{
    public function ShowPage($slug)
    {
        $post = DB::select("SELECT p.*, pc.category_name
                            FROM posts p
                            JOIN post_categories pc
                            ON p.category_id = pc.id
                            
                            WHERE p.slug = '$slug'")[0];

        $data = [
            '__title' => 'Blog Detay',
            'post' => $post,
        ];

        return view('front.blog-detail', $data);
    }
}
