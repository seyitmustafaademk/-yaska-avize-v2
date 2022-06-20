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
        $this->cart->SetShippingData($request->all());
//        /return Session::all();

        $data = [
            '__title' => 'Kreditkarte',
        ];
        return view('front.payment.third-step', $data);
    }



}
