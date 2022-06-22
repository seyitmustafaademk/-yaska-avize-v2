<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\PageContent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\DB;

class Shop_Controller extends Controller
{
    public function ShowPage($category = null)
    {
        $content = PageContent::where('page_name', '=', 'shop')->where('section_name', '=', 'section_1')->first()['content'];

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


        $category = $category === null ? 'Alle Produkte' : $category;

        $data = [
            '__title' => ($category == 'Modern' || $category == 'Antiquität') ? $category . ' Kronleuchter' : $category,
            'products' => $products,
            'category' => $category,
            'categories' => $categories,
            'content' => json_decode($content, TRUE),
        ];
        return view('front.shop', $data);
    }
}
