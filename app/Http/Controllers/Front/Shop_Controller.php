<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\DB;

class Shop_Controller extends Controller
{
    public function ShowPage()
    {
        $categories = Category::all(['id', 'category_name']);

        $products = DB::select("
                            SELECT
                                p.id, p.title, p.category, p.materials, p.negotiable, p.date_of_manufacture, p.slug, cargo_price, cargo_time, images,
                                GROUP_CONCAT(pt.diameter SEPARATOR ',') as diameter,
                                GROUP_CONCAT(pt.height SEPARATOR ',') as height,
                                GROUP_CONCAT(pt.weight SEPARATOR ',') as height,
                                GROUP_CONCAT(pt.list_price SEPARATOR ',') as list_price
                            FROM products p

                            JOIN product_details pt
                            ON pt.product_id = p.id
                            GROUP BY p.id, p.title, p.category, p.materials, p.negotiable, p.date_of_manufacture, p.slug ");

        $data = [
            '__title' => 'Shop',
            'products' => $products,
            'categories' => $categories,
        ];
        return view('front.shop', $data);
    }
}
