<?php

namespace App\Http\Controllers\Front\Payment;

use App\Http\Controllers\Controller;
use App\Libraries\Cart;
use Illuminate\Http\Request;

class SecondStep_Controller extends Controller
{
    protected $cart;
    public function __construct()
    {
        $this->cart = new Cart();
    }

    public function ShowPage(Request $request)
    {
        $this->cart->SetCartWithoutCargo($request->without_cargo == 'on' ? true : false);

        $data = [
            '__title' => 'Frachtadresse',
            'price' => $this->cart->GetPrice(),
            'paid_price' => $this->cart->GetPaidPrice(),
            'paid_price_without_cargo' => $this->cart->GetPaidPriceWithoutCargoPrice(),
            'without_cargo' => $this->cart->GetCartWithoutCargo(),
        ];
        return view('front.payment.second-step', $data);
    }
}
