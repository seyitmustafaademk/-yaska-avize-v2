<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\DB;

class Shop_Controller extends Controller
{
    public function ShowPage($category = null)
    {
        $categories = Category::all(['id', 'category_name']);

        $products = DB::select("
                            SELECT
                                p.id, p.product_name, p.category, p.materials, p.date_of_manufacture, p.slug, p.cargo_price, p.cargo_time, p.product_images,
                                GROUP_CONCAT(pt.diameter SEPARATOR ',') as diameter,
                                GROUP_CONCAT(pt.height SEPARATOR ',') as height,
                                GROUP_CONCAT(pt.weight SEPARATOR ',') as height,
                                GROUP_CONCAT(pt.list_price SEPARATOR ',') as list_price
                            FROM products p

                            JOIN product_details pt
                            ON pt.product_id = p.id
                            
                            " . ($category !== null ? "WHERE p.category = '{$category}'" : '')  . "
                            GROUP BY p.id, p.product_name, p.category, p.materials, p.date_of_manufacture, p.slug ");

//        return $products[0]->product_images;

//        return empty($products) ? 'boş': 'değil';
        $category = $category === null ? 'Alle Produkte' : $category;

        $data = [
            '__title' => 'Shop',
            'products' => $products,
            'category' => $category,
            'categories' => $categories,
        ];
        return view('front.shop', $data);
    }
}
