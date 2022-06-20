<?php

namespace App\Http\Controllers\Front\Payment;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\ProductDetail;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Libraries\Iyzipay;
use App\Libraries\Cart;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class FourthStep_Controller extends Controller
{
    protected $cart;
    protected $price = 0;
    public function __construct()
    {
        $this->cart = new Cart();
    }

    public function SetOrder(array $data)
    {
        return Order::create([
            'order_id' => $data['order_id'],
            'price' => $data['price'],
            'paid_price' => $data['paid_price'],
            'order_status' => $data['order_status'],
            'payment_status' => $data['payment_status'] != null ?? 0,
            'iyzi_commission_fee' => $data['iyzi_commission_fee'],
            'iyzi_commission_rate_amount' => $data['iyzi_commission_rate_amount'],
        ]);
    }

    public function SetOrderDetail($order_id)
    {
        $cart = $this->cart->GetCart();
        foreach ($cart as $item) {
            if (strtolower($item['packet']->p_category) == 'antika'){
                $fee = $item['count'] * $item['packet']->pd_list_price;
            }else {
                $fee = $item['count'] * $item['packet']->pd_list_price * 1.19;
            }
            OrderDetail::create([
                'order_id' => $order_id,
                'product_id' => $item['packet']->p_id,
                'product_detail_id' => $item['packet']->pd_id,
                'quantity' => $item['count'],
                'total_fee' => $fee,
            ]);
        }
    }

    public function CreateCartItems()
    {
        $cart = $this->cart->GetCart();
        $cart_items = [];
        foreach ($cart as $item){
            $cart_items[] = [
                'id' => $item['packet']->pd_id,
                'name' => $item['packet']->p_title,
                'category' => $item['packet']->p_category . ' Avize',
                'price' => intval($item['count']) * intval($item['packet']->pd_list_price),
            ];
        }
        return $cart_items;
    }

    public  function generateUniqueCode($length = 10) {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return strtoupper($randomString);
    }

    public function Payment(Request $post_data)
    {
        $shipping_data = $this->cart->GetShippingData();

        if (isset($post_data->card_number)){
            $card_number = str_replace(' ', '', $post_data->card_number);
        }

        // Create Request
        $conversationID = $this->generateUniqueCode();
        $price = $this->cart->GetPrice();
        $paidPrice = $this->cart->GetPaidPrice();
        $_3ds = $post_data->_3dsecure == 'on' ? true : false;

        // Set Payment Card
        $name = $post_data->fullname;
        $expire_month = $post_data->month;
        $expire_year = $post_data->year;
        $cvc = $post_data->cvc;

        // Set Buyer // Satın alan bilgisi
        $user_id = $conversationID;
        $buyer_name = $shipping_data['first_name'];
        $buyer_surname = $shipping_data['last_name'];
        $buyer_phone = $shipping_data['phone'];
        $buyer_email = $shipping_data['email'];
        $buyer_address = $shipping_data['street'];
        $buyer_ip = $post_data->ip();
        $buyer_city = $shipping_data['city'];
        $buyer_country = $shipping_data['country'];

        // Set Shipping Address // Kargo Adresi
        $shipping_name = $shipping_data['first_name'] . ' ' . $shipping_data['last_name'];
        $shipping_address = $shipping_data['street'];
        $shipping_city = $shipping_data['city'];
        $shipping_country = $shipping_data['country'];

        // Set Billing Address // Fatura Adresi
        $billing_name = $shipping_data['first_name'] . ' ' . $shipping_data['last_name'];
        $billing_city = $shipping_data['city'];
        $billing_country = $shipping_data['country'];
        $billing_address = $shipping_data['street'];

        $cart_items = $this->CreateCartItems();

        $iyzico = new Iyzipay($_3ds);
        $payment = $iyzico
            ->createRequest([
            'conversation_id' => $conversationID,
            'price' => $price,
            'paid_price' => $paidPrice,
            ])
            ->setPaymentCard([
                'name' => $name,
                'card_number' => $card_number,
                'expire_month' => $expire_month,
                'expire_year' => $expire_year,
                'cvc' => $cvc,
            ])
            ->setBuyer([
                'id' => $user_id,
                'name' => $buyer_name,
                'surname' => $buyer_surname,
                'phone' => $buyer_phone,
                'email' => $buyer_email,
                'identity' => '12345678901',
                'address' => $buyer_address,
                'ip' => $buyer_ip,
                'city' => $buyer_city,
                'country' => $buyer_country,
            ])
            ->setShipping([
                'name' => $shipping_name,
                'city' => $shipping_city,
                'country' => $shipping_country,
                'address' => $shipping_address,
            ])
            ->setBilling([
                'name' => $billing_name,
                'city' => $billing_city,
                'country' => $billing_country,
                'address' => $billing_address,
            ])
            ->setItems($cart_items)
            ->createPayment();

        // NORMAL PAYMENT ==== SUCCESS --> OK
        if ($payment->getStatus() == 'success' && $_3ds == false)
        {
            $order = $this->SetOrder([
                'order_id' => $conversationID,
                'price' => $price,
                'paid_price' => $paidPrice,
                'order_status' => 0,
                'payment_status' => 1,
                'iyzi_commission_fee' => $payment->getIyziCommissionFee(),
                'iyzi_commission_rate_amount' => $payment->getIyziCommissionRateAmount(),
            ]);

            $this->SetOrderDetail($order->order_id);
            DB::update("UPDATE product_details pd
                                JOIN order_details od
                                ON pd.id = od.product_detail_id
                                SET pd.quantity = pd.quantity - od.quantity
                                WHERE od.order_id = '$conversationID'");

            $data = [
                '__title' => 'Bezahlung erfolgreich',
                'error' => false,
                'conversation_id' => $payment->getConversationId(),
                'fraud_status' => $payment->getFraudStatus(), // -1 ise ödeme iptal edildi /// 0 ise iyzico onayı bekliyor
                'payment_id' => $payment->getPaymentId(), // Ödemeye ait id /// Ödeme iptali ve iyzico ile iletişimde kul
                'basket_id' => $payment->getBasketId(), // Set edilen sepet id
                'price' => $payment->getPrice(), // sadece sepetteki ürünlerin fiyatı
                'paid_price' => $payment->getPaidPrice(), // Tahsil edilen tutar // indirim, ek ücret gibi değerler hesap
                'payment_status' => $payment->getPaymentStatus(),
                'system_time' => $payment->getSystemTime(), // Dönen sonucun o anli unix timestamp değeri
                'installment' => $payment->getInstallment(), // ödeme taksit sayısı
                'iyzi_commission_fee' => $payment->getIyziCommissionFee(), // Ödemeye ait iyzico işlem ücreti
                'iyzi_commission_rate_amount' => $payment->getIyziCommissionRateAmount(), // ödemeye ait iyzico işlem komisyon tutarı
            ];
            //Session::flush();
            return redirect()->route('front.payment.fourth-step')->with(['response_data' => $data]);
        }

        // 3DS PAYMENT ==== SUCCESS
        if ($payment->getStatus() == 'success' && $_3ds == true)
        {
            $order = $this->SetOrder([
                'order_id' => $conversationID,
                'price' => $price,
                'paid_price' => $paidPrice,
                'order_status' => 0,
                'payment_status' => method_exists($payment, 'getPaymentStatus') ? $payment->getPaymentStatus() : 0,
                'iyzi_commission_fee' => method_exists($payment, 'getIyziCommissionFee') ? $payment->getIyziCommissionFee() : 0,
                'iyzi_commission_rate_amount' => method_exists($payment, 'getIyziCommissionRateAmount') ? $payment->getIyziCommissionRateAmount() : 0,
            ]);
            $this->SetOrderDetail($order->order_id);

            return $payment->getHtmlContent();
        }

        // PAYMENT ==== FAILURE
        if ($payment->getStatus() == 'failure')
        {
            if ($payment->getErrorCode() == 12)
                $error_message = 'Ungültige Kartennummer eingegeben, bitte überprüfen Sie Ihre Angaben und versuchen Sie es erneut';
            elseif ($payment->getErrorCode() == 13)
                $error_message = 'Sie haben den Ablaufmonat Ihrer Karte nicht ausgewählt, bitte überprüfen Sie Ihre Angaben und versuchen Sie es erneut';
            elseif ($payment->getErrorCode() == 14)
                $error_message = 'Sie haben das Ablaufjahr Ihrer Karte nicht ausgewählt, bitte überprüfen Sie Ihre Informationen und versuchen Sie es erneut';
            elseif ($payment->getErrorCode() == 15)
                $error_message = 'Sie haben die CVV-Nummer Ihrer Karte nicht eingegeben. Bitte überprüfen Sie Ihre Informationen und versuchen Sie es erneut';
            elseif ($payment->getErrorCode() == 16)
                $error_message = 'Sie haben den Namen auf der Karte nicht eingegeben, bitte überprüfen Sie Ihre Angaben und versuchen Sie es erneut';
            elseif ($_3ds == true)
                $error_message = 'Ihre Bank hat keine entsprechende Seite für die Zahlung mit 3D Secure gesendet!';
            else
                $error_message = 'Der Zahlungsvorgang konnte nicht abgeschlossen werden, bitte überprüfen Sie Ihre Angaben und versuchen Sie es erneut';

            //$error_message = $payment->getErrorCode();
            $data = [
                '__title' => 'Zahlung konnte nicht abgeschlossen werden',
                'error' => true,
                'error_message' => $error_message,
            ];
            return redirect()->route('front.payment.fourth-step')->with(['response_data' => $data]);
        }
    }

    public function Callback3DS(Request $request)
    {
        if ($request->status == 'success' && $request->mdStatus == 1){
            $iyzico = new Iyzipay();
            $payment = $iyzico->LastQuery3D([
                'conversation_id' => $request->conversationId,
                'payment_id' => $request->paymentId,
                'conversation_data' => $request->conversationData,
            ]);

            $price = $payment->getPrice(); // sadece sepetteki ürünlerin fiyatı
            $paid_price = $payment->getPaidPrice(); // Tahsil edilen tutar // indirim, ek ücret gibi değerler hesap
            $conversation_id = $payment->getConversationId();
            $paymet_id = $payment->getPaymentId();  // Ödemeye ait id /// Ödeme iptali ve iyzico ile iletişimde kul
            $basket_id = $payment->getBasketId(); // Set edilen sepet id
            $fraud_status = $payment->getFraudStatus(); // -1 ise ödeme iptal edildi /// 0 ise iyzico onayı bekliyor
            $system_time = $payment->getSystemTime(); // Dönen sonucun o anli unix timestamp değeri
            $iyzico_commission_fee = $payment->getIyziCommissionFee(); // Ödemeye ait iyzico işlem ücreti
            $iyzi_commission_rate_amount =  $payment->getIyziCommissionRateAmount(); // ödemeye ait iyzico işlem komisyon tutarı

            // 3D Ödeme işlemi tammalandı
            if ($payment->getStatus() == 'success' && $fraud_status == 1){
                Order::where('order_id', $payment->getConversationId())->update([
                    'payment_status' => 1,
                    'iyzi_commission_fee' => $payment->getIyziCommissionFee(),
                    'iyzi_commission_rate_amount' => $payment->getIyziCommissionRateAmount(),
                ]);
                DB::update("UPDATE product_details pd
                                JOIN order_details od
                                ON pd.id = od.product_detail_id
                                SET pd.quantity = pd.quantity - od.quantity
                                WHERE od.order_id = '" . $payment->getConversationId() . "'");

                $data = [
                    '__title' => 'Bezahlung erfolgreich',
                    'error' => false,
                    'conversation_id' => $conversation_id,
                    'fraud_status' => $fraud_status,
                    'payment_id' => $paymet_id,
                    'basket_id' => $basket_id,
                    'price' => $price,
                    'paid_price' => $paid_price,
                    'system_time' => $system_time,
                    'iyzi_commission_fee' => $iyzico_commission_fee,
                    'iyzi_commission_rate_amount' => $iyzi_commission_rate_amount,
                ];
                return redirect()->route('front.payment.fourth-step')->with(['response_data' => $data]);
            }

            // Ödeme işlemi tamamlandı ama Iyzıco onayı bekliyor
            if ($fraud_status == 0){
                Order::where('order_id', $payment->getConversationId())->update([
                    'payment_status' => 0,
                    'iyzi_commission_fee' => $payment->getIyziCommissionFee(),
                    'iyzi_commission_rate_amount' => $payment->getIyziCommissionRateAmount(),
                ]);

                $data = [
                    '__title' => 'Bezahlung erfolgreich',
                    'error' => false,
                    'conversation_id' => $conversation_id,
                    'fraud_status' => $fraud_status,
                    'payment_id' => $paymet_id,
                    'basket_id' => $basket_id,
                    'price' => $price,
                    'paid_price' => $paid_price,
                    'system_time' => $system_time,
                    'iyzi_commission_fee' => $iyzico_commission_fee,
                    'iyzi_commission_rate_amount' => $iyzi_commission_rate_amount,
                ];
                return redirect()->route('front.payment.fourth-step')->with(['response_data' => $data]);
            }

            // Ödeme işlemi Iyzıco tarafından reddedildi
            if ($fraud_status == -1){
                Order::where('order_id', $payment->getConversationId())->update([
                    'payment_status' => -1,
                    'iyzi_commission_fee' => -1,
                    'iyzi_commission_rate_amount' => -1,
                ]);

                $data = [
                    '__title' => 'Zahlung konnte nicht abgeschlossen werden',
                    'error' => true,
                    'error_message' => 'Während der Zahlungstransaktion wurde die Transaktion von Iyzico abgelehnt!',
                    ];
                return redirect()->route('front.payment.fourth-step')->with(['response_data' => $data]);
            }
        }
        elseif ($request->mdStatus == 0){
            $data = [
                '__title' => 'Zahlung konnte nicht abgeschlossen werden',
                'error' => true,
                'error_message' => '3D Secure-Signatur ist ungültig oder nicht verifiziert!',
            ];
            return redirect()->route('front.payment.fourth-step')->with(['response_data' => $data]);
        }
        elseif ($request->mdStatus == 2){
            $data = [
                '__title' => 'Zahlung konnte nicht abgeschlossen werden',
                'error' => true,
                'error_message' => 'Der Besitzer oder die Bank der Karte ist nicht im System registriert',
            ];
            return redirect()->route('front.payment.fourth-step')->with(['response_data' => $data]);
        }
        elseif ($request->mdStatus == 3){
            $data = [
                '__title' => 'Zahlung konnte nicht abgeschlossen werden',
                'error' => true,
                'error_message' => 'Die Bank der Karte ist nicht im System registriert!',
            ];
            return redirect()->route('front.payment.fourth-step')->with(['response_data' => $data]);
        }
        elseif ($request->mdStatus == 4){
            $data = [
                '__title' => 'Zahlung konnte nicht abgeschlossen werden',
                'error' => true,
                'error_message' => 'Verifizierungsversuch, Karteninhaber entschied sich später im System zu registrieren',
            ];
            return redirect()->route('front.payment.fourth-step')->with(['response_data' => $data]);
        }
        elseif ($request->mdStatus == 5){
            $data = [
                '__title' => 'Zahlung konnte nicht abgeschlossen werden',
                'error' => true,
                'error_message' => 'Kann nicht überprüft werden!',
            ];
            return redirect()->route('front.payment.fourth-step')->with(['response_data' => $data]);
        }
        elseif ($request->mdStatus == 6){
            $data = [
                '__title' => 'Zahlung konnte nicht abgeschlossen werden',
                'error' => true,
                'error_message' => '3D Secure-Fehler!',
            ];
            return redirect()->route('front.payment.fourth-step')->with(['response_data' => $data]);
        }
        elseif ($request->mdStatus == 7){
            $data = [
                '__title' => 'Zahlung konnte nicht abgeschlossen werden',
                'error' => true,
                'error_message' => 'Systemfehler: Während der Zahlung ist ein systembezogenes Problem aufgetreten. Versuchen Sie es später noch einmal',
            ];
            return redirect()->route('front.payment.fourth-step')->with(['response_data' => $data]);
        }
        elseif ($request->mdStatus == 8){
            $data = [
                '__title' => 'Zahlung konnte nicht abgeschlossen werden',
                'error' => true,
                'error_message' => 'Unbekannte Kartennummer! Bitte geben Sie eine gültige Kartennummer ein.',
            ];
            return redirect()->route('front.payment.fourth-step')->with(['response_data' => $data]);
        }


        if ($request->status == 'success'){

        }else{
            return 'Ihre Bank hat keine entsprechende Seite für die 3D-Secure-Zahlung übermittelt!';
        }
        dd($request);
    }

    public function ShowPage()
    {
        $data =  Session::get('response_data');
        if ($data == null)
            return redirect()->route('front.shop');
        return view('front.payment.fourth-step', $data);
    }

}