<?php

namespace App\Http\Controllers\Front\Payment;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Libraries\Cart;

class FirstStep_Controller extends Controller
{
    protected $cart;
    public function __construct()
    {
        $this->cart = new Cart();
    }

    public function ShowPage()
    {
        if ($this->cart->CheckSepetIsNull())
            return redirect()->route('front.shop');
        $data = [
            '__title' => 'Korb',
            'cart' => $this->cart->GetCart(),
            'price' => $this->cart->GetPrice(),
            'paid_price' => $this->cart->GetPaidPrice(),
            'paid_price_without_cargo' => $this->cart->GetPaidPriceWithoutCargoPrice(),
        ];

        return view('front.payment.first-step', $data);
    }
}
