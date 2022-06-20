<?php

namespace App\Http\Controllers\Front\Payment;

use App\Http\Controllers\Controller;
use App\Libraries\Cart;

class SecondStep_Controller extends Controller
{
    protected $cart;
    public function __construct()
    {
        $this->cart = new Cart();
    }

    public function ShowPage()
    {
        $data = [
            '__title' => 'Frachtadresse',
            'price' => $this->cart->GetPrice(),
            'paid_price' => $this->cart->GetPaidPrice(),
        ];
        return view('front.payment.second-step', $data);
    }
}
