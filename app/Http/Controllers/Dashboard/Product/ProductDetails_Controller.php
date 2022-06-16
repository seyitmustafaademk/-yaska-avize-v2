<?php

namespace App\Http\Controllers\Dashboard\Product;

use App\Http\Controllers\Controller;
use App\Models\ProductDetail;
use Illuminate\Http\Request;
use Iyzipay\Request\RetrieveApmRequest;

class ProductDetails_Controller extends Controller
{
    public function ShowPage($pid)
    {
        $Product_details = ProductDetail::where('product_id', '=', $pid)->get();

//        return $Product_details[0]->id;


        $data = [
            '__title' => 'Ürün Detayları | Çapları',
            'product_details' => $Product_details,
            'pid' => $pid,
        ];

        return view('dashboard.products.product-details', $data);
    }

    public function DeleteProductDetail($pid, $id)
    {
        $deleted = ProductDetail::where('id', '=', $id)->delete();

        return redirect()->route('admin.product-detail', $pid);
    }

    public function ProductDetailUpdate(Request $request)
    {

    }
}
