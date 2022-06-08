<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Orders_Controller extends Controller
{
    public function ShowPage()
    {
        $orders = Order::all();
        $data = [
            '__title' => 'Orders',
            'orders' => $orders,
        ];

        return view('dashboard.orders', $data);
    }

    public function ShowDetail($order_id)
    {
        $products = DB::select("SELECT * 
                            FROM product_details pd
                            
                            JOIN order_details od
                            ON pd.id = od.product_detail_id
                            JOIN products p 
                            ON p.id = pd.product_id
                            
                            WHERE od.order_id = $order_id");


        $data = [
            '__title' => 'Orders',
            'products' => $products,
        ];

        return view('dashboard.order-detail', $data);
    }
}
