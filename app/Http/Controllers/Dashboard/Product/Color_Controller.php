<?php

namespace App\Http\Controllers\Dashboard\Product;

use App\Http\Controllers\Controller;
use App\Models\ProductColor;
use http\Env\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Color_Controller extends Controller
{
    public function ShowPage()
    {
//        $colors = ProductColor::orderBy('created_at', 'DESC')->get();
        $colors = ProductColor::all();
        $data = [
            '__title' => 'Renk Yönetimi',
            'colors' => $colors,
        ];

        return view('dashboard.products.add-color', $data);
    }

    public function InsertColor(Request $request)
    {
        try {
            $inserted = ProductColor::create([
                'color_name' => $request->color_name,
                'color_hex_code' => $request->color_hex_code,
            ]);
            return redirect()->route('admin.product.colors');
        } catch (\Exception $exception){
            return redirect()->route('admin.product.colors');
        }
    }

    public function DeleteColor(Request $request)
    {
        try {
            $deleted = ProductColor::where('id', $request->id)->delete();

            return redirect()->route('admin.product.colors');
        } catch (\Exception $exception){
            return redirect()->route('admin.product.colors');
        }
    }
}
