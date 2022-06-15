<?php

namespace App\Http\Controllers\Dashboard\Product;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class Products_Controller extends Controller
{
    public function ShowPage()
    {
        $products = Product::all();
        $categories = Category::all('id', 'category_name');

        $data = [
            '__title' => 'Products',
            'categories' => $categories,
            'products' => $products,
        ];
        return view('dashboard.products.list', $data);
    }

    public function DeleteProduct($id)
    {
        $deleted = Product::where('id', '=', $id)->delete();

        return redirect()->route('admin.products');
    }

    public function StockUpdate(Request $request)
    {
        $affected = DB::table('products')
            ->where('id', $request->id)
            ->update(['stock' => $request->stock]);

        return redirect()->route('admin.products');
    }
}
