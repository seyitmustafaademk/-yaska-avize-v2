<?php

namespace App\Libraries;

use Iyzipay\Model\Address;
use Iyzipay\Model\BasketItem;
use Iyzipay\Model\BasketItemType;
use Iyzipay\Model\Buyer;
use Iyzipay\Model\CheckoutForm;
use Iyzipay\Model\CheckoutFormInitialize;
use Iyzipay\Model\Currency;
use Iyzipay\Model\Locale;
use Iyzipay\Model\Payment;
use Iyzipay\Model\PaymentCard;
use Iyzipay\Model\PaymentChannel;
use Iyzipay\Model\PaymentGroup;
use Iyzipay\Model\ThreedsInitialize;
use Iyzipay\Model\ThreedsPayment;
use Iyzipay\Options;
use Iyzipay\Request\CreateCheckoutFormInitializeRequest;
use Iyzipay\Request\CreatePaymentRequest;
use Iyzipay\Request\CreateThreedsPaymentRequest;
use Iyzipay\Request\RetrieveCheckoutFormRequest;
use IyzipayBootstrap;

class Iyzipay
{
    protected $options;
    protected $request;
    protected $basketItems; // sepetteki ürünler listesi
    protected $_3ds;

    public function __construct($_3ds = false)
    {
        $this->options = new Options();
        $this->options->setApiKey('sandbox-B5EDta0bGRrEhefH8M13qQS3EygJd7b8');
        $this->options->setSecretKey('sandbox-YPC25sk1BW5YbDY8pQnxQQzc5WPSCndG');
        $this->options->setBaseUrl('https://sandbox-api.iyzipay.com');
        $this->basketItems = [];
        $this->_3ds = $_3ds;
    }

    // Request Oluşturma
    public function createRequest(array $params)
    {
        $this->request = new CreatePaymentRequest();
        $this->request->setLocale(Locale::EN);
        $this->request->setConversationId($params['conversation_id']);
        $this->request->setPrice($params['price']);
        $this->request->setPaidPrice($params['paid_price']);
        $this->request->setCurrency(Currency::USD);
        $this->request->setInstallment(1);
        if ($this->_3ds == true)
            $this->request->setCallbackUrl(route('callback-3ds'));
        //$this->request->setBasketId("B67832");
        //$this->request->setPaymentChannel(PaymentChannel::WEB);
        //$this->request->setPaymentGroup(PaymentGroup::PRODUCT);
        return $this;
    }

    // Kredi Kartı Bilgileri ataması
    public function setPaymentCard(array $params)
    {
        $paymentCard = new PaymentCard();
        $paymentCard->setCardHolderName( $params['name'] );
        $paymentCard->setCardNumber( $params['card_number'] );
        $paymentCard->setExpireMonth( $params['expire_month'] );
        $paymentCard->setExpireYear( $params['expire_year'] );
        $paymentCard->setCvc( $params['cvc'] );
        $this->request->setPaymentCard($paymentCard);
        return $this;
    }

    // Alıcı Bilgileri
    public function setBuyer(Array $params)
    {
        $buyer = new Buyer();
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
        $shippingAddress = new Address();
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
        $billingAddress = new Address();
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
            $basketItem = new BasketItem();
            $basketItem->setId($value['id']);
            $basketItem->setName($value['name']);
            $basketItem->setCategory1($value['category']);
            $basketItem->setItemType(BasketItemType::PHYSICAL);
            $basketItem->setPrice($value['price']);
            array_push($this->basketItems, $basketItem);
        }
        $this->request->setBasketItems($this->basketItems);
        return $this;
    }

    // API isteği ( Satın alma isteği )
    public function createPayment()
    {
        if ($this->_3ds == true)
            $payment = ThreedsInitialize::create($this->request, $this->options);
        else
            $payment = Payment::create($this->request, $this->options);
        return $payment;
    }

    public function LastQuery3D($params)
    {
        $request = new CreateThreedsPaymentRequest();
        $request->setLocale(Locale::TR);
        $request->setConversationId($params['conversation_id']);
        $request->setPaymentId($params['payment_id']);
        $request->setConversationData($params['conversation_data']);

        $threedsPayment = ThreedsPayment::create($request, $this->options);
        return $threedsPayment;
    }
}