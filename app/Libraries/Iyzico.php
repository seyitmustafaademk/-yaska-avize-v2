<?php

namespace App\Libraries;

use Iyzipay\Options;

class Iyzico
{
    protected $options;
    protected $request;
    protected $basketItems; // sepetteki ürünler listesi

    public function __construct($request)
    {
        $this->options = new Options();
        $this->options->setApiKey('asdadas');
        $this->options->setSecretKey('asdadas');
        $this->options->setBaseUrl('asdadas');
        $this->basketItems = [];
        $this->request = $request;
    }

    // Form bilgileri (Price, Paid Price, Callback URL, BasketID, ConversationID)
    public function setForm(array $params)
    {
        $this->request = new \Iyzipay\Request\CreateCheckoutFormInitializeRequest();
        $this->request->setLocale(\Iyzipay\Model\Locale::TR);
        $this->request->setConversationId($params['conversationID']);
        $this->request->setPrice($params['price']);
        $this->request->setPaidPrice($params['paidPrice']);
        $this->request->setCurrency(\Iyzipay\Model\Currency::TL);
        $this->request->setBasketId($params['basketID']);
        $this->request->setPaymentGroup(\Iyzipay\Model\PaymentGroup::PRODUCT);
        $this->request->setCallbackUrl(route('front.payment.fourth-step'));
        $this->request->setEnabledInstallments(array(2, 3, 6, 9));
        return $this;
    }

    // Alıcı Bilgileri
    public function setBuyer(Array $params)
    {
        $buyer = new \Iyzipay\Model\Buyer();
        $buyer->setId($params['id']);
        $buyer->setName($params['name']);
        $buyer->setSurname($params['surname']);
        $buyer->setGsmNumber($params['phone']);
        $buyer->setEmail($params['email']);
        $buyer->setIdentityNumber($params['identity']);
        $buyer->setRegistrationAddress($params['address']);
        $buyer->setIp($params['ip']);
        $buyer->setCity($params['city']);
        $buyer->setCountry($params['country']);
        $this->request->setBuyer($buyer);
        return $this;
    }

    // Kargo Adresi
    public function setShipping(array $params)
    {
        $shippingAddress = new \Iyzipay\Model\Address();
        $shippingAddress->setContactName($params['name']);
        $shippingAddress->setCity($params['city']);
        $shippingAddress->setCountry($params['country']);
        $shippingAddress->setAddress($params['address']);
        $this->request->setShippingAddress($shippingAddress);
        return $this;
    }

    // Fatura Adresi
    public function setBilling(array $params)
    {
        $billingAddress = new \Iyzipay\Model\Address();
        $billingAddress->setContactName($params['name']);
        $billingAddress->setCity($params['city']);
        $billingAddress->setCountry($params['country']);
        $billingAddress->setAddress($params['address']);
        $this->request->setBillingAddress($billingAddress);
        return $this;
    }

    // Sepet Ürünlerinin atanması
    public function setItems(array $items)
    {
        foreach ($items as $key => $value) {
            $basketItem = new \Iyzipay\Model\BasketItem();
            $basketItem->setId($value['id']);
            $basketItem->setName($value['name']);
            $basketItem->setCategory1($value['category']);
            $basketItem->setItemType(\Iyzipay\Model\BasketItemType::PHYSICAL);
            $basketItem->setPrice($value['price']);
            array_push($this->basketItems, $basketItem);
        }
        $this->request->setBasketItems($this->basketItems);
        return $this;
    }

    // Payment Form Oluşturma
    public function paymentForm()
    {
        $form = \Iyzipay\Model\CheckoutFormInitialize::create($this->request, $this->options);
        return $form;
    }

    // Callback URL Function
    public function callbackForm($token, $conversationID)
    {
        $request = new \Iyzipay\Request\RetrieveCheckoutFormRequest();
        $request->setLocale(\Iyzipay\Model\Locale::TR);
        $request->setConversationId($conversationID);
        $request->setToken($token);
        $checkoutForm = \Iyzipay\Model\CheckoutForm::retrieve($request, $this->options);
        return $checkoutForm;
    }
}