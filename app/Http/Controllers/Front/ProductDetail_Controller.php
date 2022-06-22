<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductDetail_Controller extends Controller
{
    public function ShowPage($slug)
    {
        $product_id = DB::select("SELECT id FROM products WHERE slug='$slug' LIMIT 1")[0]->id;
        $products = DB::select("
                                SELECT
                                   p.*,
                                   GROUP_CONCAT(pd.id SEPARATOR ',') as pd_id,
                                   GROUP_CONCAT(pd.diameter SEPARATOR ',') as diameter,
                                   GROUP_CONCAT(pd.height SEPARATOR ',') as height,
                                   GROUP_CONCAT(pd.weight SEPARATOR ',') as weight,
                                   GROUP_CONCAT(pd.list_price SEPARATOR ',') as list_price
                                FROM products p
                                JOIN product_details pd
                                ON pd.product_id = p.id
                                
                                WHERE p.id = $product_id
        ")[0];

//        return json_decode(json_decode($products->more_materials, TRUE), TRUE);

        $data = [
            '__title' => $products->product_name,
            'products' => $products,
        ];

        return view('front.product-detail', $data);
    }

    public function GetImages($pid, $pdid)
    {
        $product_detail = DB::select("
                                SELECT *
                                FROM product_details
                                WHERE product_id = $pid AND id = $pdid;
                                ");

        return response()->json($product_detail[0]);
    }
}
