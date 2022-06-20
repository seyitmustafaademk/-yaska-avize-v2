<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\PostCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BlogDetail_Controller extends Controller
{
    public function ShowPage($slug)
    {
        $categories = PostCategory::all();
        $latest_news = Post::orderBy('id', 'desc')->skip(0)->take(3)->get();
        $post = DB::select("SELECT p.*, pc.category_name
                            FROM posts p
                            JOIN post_categories pc
                            ON p.category_id = pc.id
                            
                            WHERE p.slug = '$slug'")[0];

        $data = [
            '__title' => $post->title,
            'post' => $post,
            'categories' => $categories,
            'latest_news' => $latest_news,
        ];

        return view('front.blog-detail', $data);
    }
}
