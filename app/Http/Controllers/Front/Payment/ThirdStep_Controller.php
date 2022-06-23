<?php

namespace App\Http\Controllers\Front\Payment;

use App\Http\Controllers\Controller;
use App\Libraries\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ThirdStep_Controller extends Controller
{
    protected $cart;
    public function __construct()
    {
        $this->cart = new Cart();
    }

    public function ShowPage(Request $request)
    {
//        return $this->cart->GetCart();

        $data = [
            '__title' => 'Kreditkarte',
            'paid_price_without_cargo' => $this->cart->GetPaidPriceWithoutCargoPrice(),
            'without_cargo' => $this->cart->GetCartWithoutCargo(),
        ];
        return view('front.payment.third-step', $data);
    }



}
