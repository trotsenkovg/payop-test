<?php

namespace Src\Api\Payop\v1\Invoice;

use Exception;
use Src\Models\Order;
use Src\Helpers\Signature;
use Src\Http\HttpClient;
use Src\Models\Payer;

class Invoice implements IInvoice
{

    /**
     * @param HttpClient $client
     * @return InvoiceResponse
     * @throws Exception
     */
    public function createInvoice(HttpClient $client): InvoiceResponse
    {
        $payer = new Payer('test@example.com');
        $order = new Order('FF01', '100.0000', 'USD', [
            'id' => '487',
            'name' => 'Item 1',
            'price' => '100.0000'
        ]);

        $response = $client->execute('/invoices/create', 'POST', [
            'publicKey' => $client->getPublicKey(),
            'order'     => $order->getInfo(),
            'signature' => Signature::create($order->getSignInfo(), $client->getSecretKey(), $client->getAlgorithm()),
            'payer'     => $payer->getInfo(),
            'language'  => $client->getLanguage(),
        ]);

        return new InvoiceResponse($response, 'create');
    }

    /**
     * @param HttpClient $client
     * @return InvoiceResponse
     * @throws Exception
     */
    public function getInvoice(HttpClient $client): InvoiceResponse
    {
        $invoice_id = '81962ed0-a65c-4d1a-851b-b3dbf9750399';

        $response = $client->execute("/invoices/$invoice_id", 'GET');

        return new InvoiceResponse($response, 'get');
    }

    /**
     * @param HttpClient $client
     * @return InvoiceResponse
     * @throws Exception
     */
    public function getAvailablePaymentMethods(HttpClient $client): InvoiceResponse
    {
        $projectId = $client->getProjectId();
        $response = $client->execute("/instrument-settings/payment-methods/available-for-application/$projectId", 'GET');

        return new InvoiceResponse($response, 'paymentMethods');
    }
}