<?php

namespace App\Http\Controllers\Dashboard\Blog;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PostCategory;

class Category_Controller extends Controller
{
    public function ShowPage()
    {
        $categories = PostCategory::all();

        $data = [
            '__title' => 'Blog Kategori Yönetimi',
            'categories' => $categories,
        ];
        return view('dashboard.blog.categories', $data);
    }

    public function Insert(Request $request)
    {
        $category_name = $request->category_name;

        $insert = PostCategory::create([
            'category_name' => $category_name,
        ]);

        return redirect()->route('admin.blog.categories');
    }

    public function Delete(Request $request)
    {
        $delete = PostCategory::where('id', $request->id)->delete();

        if ($delete)
            return response()->json([
                'status_code' => 'success',
                'status_message' => 'Kategori başarıyla silindi!',
            ]);
        else
            return response()->json([
                'status_code' => 'failed',
                'status_message' => 'Kategori silinemedi, tekrar deneyin!',
            ]);
    }
}
