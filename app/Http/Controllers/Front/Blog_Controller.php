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
        if ($category_name == null){
            $query_string = "SELECT p.*, pc.category_name
                                FROM posts p
                                JOIN post_categories pc
                                ON p.category_id = pc.id
                                ORDER BY p.id DESC";
            $title = 'Blog Sayfası';
        }
        else{

            $query_string = "SELECT p.*, pc.category_name
                                FROM posts p
                            
                                JOIN post_categories pc
                                ON p.category_id = pc.id
                            
                                WHERE pc.category_name = '$category_name'
                                ORDER BY p.id DESC
                                ";
            $title = "$category_name Kategorisindeki Yazılar";
        }

        $categories = PostCategory::all();
        $posts = DB::select($query_string);
        $latest_news = Post::orderBy('id', 'desc')->skip(0)->take(3)->get();
//        return $latest_news;

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
