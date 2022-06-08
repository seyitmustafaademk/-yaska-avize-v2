<?php

namespace App\Http\Controllers\Dashboard\Product;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use PhpParser\Node\Stmt\TryCatch;

class Category_Controller extends Controller
{
    public function ShowPage()
    {
//        $categories = Category::orderBy('created_at', 'DESC')->get();
        $categories = Category::all();

        $data = [
            '__title' => 'Kategori Yönetimi',
            'categories' => $categories,
        ];
        return view('dashboard.products.categories', $data);
    }

    public function InsertCategory(Request $request)
    {
        try {
            $inserted = Category::create([
                'category_name' => $request->category_name,
            ]);
            return redirect()->route('admin.product.categories');

        } catch (\Exception $exception){
            return redirect()->route('admin.product.categories');
        }
    }

    public function DeleteCategory(Request $request)
    {
        try {
            $delete = Category::where('id', $request->id)->delete();
            return redirect()->route('admin.product.categories');

        } catch (\Exception $exception) {
            return redirect()->route('admin.product.categories');
        }

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
