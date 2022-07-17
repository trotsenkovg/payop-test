<?php

namespace Src\Api\Payop\v1\Invoice;

use Src\Http\HttpClient;

interface IInvoice
{
    public function createInvoice(HttpClient $client): InvoiceResponse;
    public function getInvoice(HttpClient $client): InvoiceResponse;
    public function getAvailablePaymentMethods(HttpClient $client): InvoiceResponse;
}