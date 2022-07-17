<?php

namespace Src\Api\Payop\v1\Checkout;

use Src\Http\HttpClient;

interface ICheckout
{
    public function createCardToken(HttpClient $client): CheckoutResponse;
    public function captureTransaction(HttpClient $client): CheckoutResponse;
    public function voidTransaction(HttpClient $client): CheckoutResponse;
    public function checkInvoiceStatus(HttpClient $client): CheckoutResponse;
    public function createCheckoutTransaction(HttpClient $client): CheckoutResponse;

}