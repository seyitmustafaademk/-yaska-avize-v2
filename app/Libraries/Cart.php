<?php

namespace App\Libraries;

use App\Http\Controllers\Front\Homepage_Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class Cart
{
    public function CheckSepetIsNull()
    {
        $cart = $this->GetCart();

        if ($cart == null)
            return true;
        else
            return false;
    }

    public function GetCart()
    {
        return Session::get('cart');
    }

    public function SetCartItem($id)
    {
        $cart = $this->GetCart();
        if ($cart == null){
            $cart[$id] = [
                'count' => 1,
                'packet' => $this->GetProductDetail($id),
            ];
        }
        else{
            $match = false;
            foreach ($cart as $key => $value){
                if ($key == $id){
                    $cart[$id]['count']++;
                    $match = true;
                }
            }

            if (!$match){
                $cart[$id] = [
                    'count' => 1,
                    'packet' => $this->GetProductDetail($id),
                ];
            }
        }
        Session::put('cart', $cart);
    }

    public function GetProductDetail($pd_id)
    {
        return DB::select("SELECT
                p.id as p_id,
                p.product_name as p_title, 
                p.category as p_category, 
                p.date_of_manufacture as p_date_of_manufacture, 
                p.slug as p_slug, 
                p.cargo_price as p_cargo_price, 
                p.cargo_time as p_cargo_time,
                p.product_images as p_images,
                pd.id as pd_id,
                pd.product_id as pd_product_id,
                pd.diameter as pd_diameter,
                pd.height as pd_height,
                pd.weight as pd_weight,
                pd.list_price as pd_list_price,
                pd.diameter_images as pd_primary_image
            FROM product_details pd
            
            JOIN products p
            ON p.id = pd.product_id
            
            WHERE pd.id = $pd_id")[0];
    }

    public function GetPopupData()
    {
        $cart = $this->GetCart();
        if ($cart == null){
            return response()->json([
                'items' => null,
                'count' => 0,
            ]);
        }else {
            $items = view('front.components.popup-cart-item', [
                'cart' => $cart
            ])->render();

            $count = 0;
            foreach ($cart as $value) {
                $count += intval($value['count']);
            }
            return response()->json([
                'items' => $items,
                'count' => $count,
            ]);
        }
    }

    public function DecreaseCartItem($id)
    {
        $cart = $this->GetCart();
        if ($cart == null){
            return false;
        }
        else{
            foreach ($cart as $key => $value){
                if ($key == $id){
                    if ($value['count'] > 1)
                        $cart[$id]['count'] --;
                    else
                        unset($cart[$key]);
                }
            }
        }
        if (Session::get('cart') == null)
            Session::forget('cart');
        Session::put('cart', $cart);

        return true;
    }

    public function DeleteCartItem($id)
    {
        $cart = $this->GetCart();
        if ($cart == null){
            return false;
        }
        else{
            foreach ($cart as $key => $value){
                if ($key == $id){
                    unset($cart[$key]);
                }
            }
        }
        Session::put('cart', $cart);
        if (Session::get('cart') == null)
            Session::forget('cart');

        return true;
    }

    public function GetPrice()
    {
        $price = 0;
        foreach ($this->GetCart() as $key => $value){
            $price += floatval($value['count']) * floatval($value['packet']->pd_list_price);
        }
        return $price;
    }

    public function GetPaidPrice ()
    {
        $paid_price = 0;
        foreach ($this->GetCart() as $value){
            $price = 0;
            $price += floatval($value['count']) * floatval($value['packet']->pd_list_price);
            if (strtolower($value['packet']->p_category) != 'antika'){
                $price = $price * 1.19;
            }
            $price += floatval($value['packet']->p_cargo_price);
            $paid_price += $price;
        }
        return $paid_price;
    }

    /************************************************/
    /************************************************/
    /************************************************/

    public function GetShippingData()
    {
        return Session::get('shipping_data');
    }

    public function SetShippingData($data)
    {
        Session::put('shipping_data', $data);
    }
}