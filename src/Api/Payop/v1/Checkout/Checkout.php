<?php

namespace Src\Api\Payop\v1\Checkout;

use Src\Http\HttpClient;

class Checkout implements ICheckout
{

    public function createCardToken(HttpClient $client): CheckoutResponse
    {
        // TODO: Implement createCardToken() method.
    }

    public function captureTransaction(HttpClient $client): CheckoutResponse
    {
        // TODO: Implement captureTransaction() method.
    }

    public function voidTransaction(HttpClient $client): CheckoutResponse
    {
        // TODO: Implement voidTransaction() method.
    }

    public function checkInvoiceStatus(HttpClient $client): CheckoutResponse
    {
        // TODO: Implement checkInvoiceStatus() method.
    }

    public function createCheckoutTransaction(HttpClient $client): CheckoutResponse
    {
        // TODO: Implement createCheckoutTransaction() method.
    }
}