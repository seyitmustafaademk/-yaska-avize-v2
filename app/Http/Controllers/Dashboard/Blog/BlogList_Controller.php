<?php

namespace App\Http\Controllers\Dashboard\Blog;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BlogList_Controller extends Controller
{
    public function ShowPage()
    {
        $posts = DB::select("SELECT p.*, pc.category_name
                                        FROM posts p
                                        JOIN post_categories pc
                                        ON p.category_id = pc.id");
//return $posts;

        $data = [
            '__title' => 'Posts',
            'posts' => $posts,
        ];
        return view('dashboard.blog.list', $data);
    }

    public function DeleteContent($id)
    {
        Post::where('id', $id)->delete();

        return redirect()->route('admin.blog.list');
    }
}
