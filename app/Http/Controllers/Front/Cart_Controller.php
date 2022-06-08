<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use App\Libraries\Cart;

class Cart_Controller extends Controller
{
    protected $cart;
    public function __construct()
    {
        $this->cart = new Cart();
    }

    public function GetPopupData()
    {
        return $this->cart->GetPopupData();
    }

    public function SetCartItem($pd_id)
    {
        $this->cart->SetCartItem($pd_id);

        return redirect()->route('front.payment.first-step');
    }
    public function DecreaseCart($id){
        $this->cart->DecreaseCartItem($id);
        return redirect()->route('front.payment.first-step');
    }

    public function DeleteCart($id)
    {
        $this->cart->DeleteCartItem($id);
        return redirect()->route('front.payment.first-step');
    }
}
