<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\PostCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Blog_Controller extends Controller
{
    public function ShowPage($category_name = null)
    {
        $categories = PostCategory::all();

        $title = $category_name == null ? "Stories" : "Beiträge in der $category_name-Kategorie";
        $posts = DB::select("SELECT p.*, pc.category_name
                                FROM posts p
                                JOIN post_categories pc
                                ON p.category_id = pc.id
                            
                                " . ($category_name != null ? " WHERE pc.category_name = '$category_name'" : '' ) . "
                                ORDER BY p.id DESC
                                ");
        $latest_news = Post::orderBy('id', 'desc')->skip(0)->take(3)->get();

        $data = [
            '__title' => $title,
            'posts' => $posts,
            'categories' => $categories,
            'latest_news' => $latest_news,
        ];
        return view('front.blog', $data);
    }

    public function ShowCategory($category)
    {
        return $this->ShowPage($category);
    }
}
