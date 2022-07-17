<?php

namespace Src\Api\Payop\v1\Invoice;

class InvoiceResponse
{
    /**
     * Create new Invoice messages
     */
    const SUCCESS_CREATE_MESSAGE = 'New invoice created successfully.';
    const UNPROCESSABLE_ENTITY_CREATE = 'Incorrect signature.';
    const FAIL_CREATE_MESSAGE = 'Invoice is not created.';

    /**
     * Get Invoice messages
     */
    const GET_NEW = 'New invoice.';
    const GET_ACCEPTED = 'Invoice was paid successfully.';
    const GET_PENDING = 'Invoice pending.';
    const GET_FAILED = 'Invoice failed.';
    const GET_UNKNOWN = 'Unknown Invoice status.';
    const GET_NOT_FOUND = 'Invoice not found.';

    /**
     * Get Payment Methods messages
     */
    const PAYMENT_UNAUTHORIZED = 'Authorization token invalid';

    /**
     * @var array
     */
    private array $response;

    /**
     * @param array $response
     * @param string $method
     */
    public function __construct(array $response, string $method)
    {
        $this->response = $response;

        if (method_exists($this, $method)) {
            $this->$method();
        }
    }

    /**
     * @return void
     */
    private function create(): void
    {
        switch ($this->response['status_code']) {
            case 200:
                $message = self::SUCCESS_CREATE_MESSAGE;
                break;
            case 422:
                $message = self::UNPROCESSABLE_ENTITY_CREATE;
                break;
            default:
                $message = self::FAIL_CREATE_MESSAGE.$this->getResponseMessage();
                break;
        }
        print_r($message . PHP_EOL);
    }

    /**
     * @return void
     */
    private function get(): void
    {
        switch ($this->response['status_code']) {
            case 200:
                $status = $this->response['data']['status'] ?? '';
                if (!empty($status)) {
                    switch ($status) {
                        case 0:
                            $message = self::GET_NEW;
                            break;
                        case 1:
                            $message = self::GET_ACCEPTED;
                            break;
                        case 3:
                            $message = self::GET_PENDING;
                            break;
                        case 4:
                            $message = self::GET_FAILED;
                            break;
                        default:
                            $message = self::GET_UNKNOWN;

                    }
                } else {
                    $message = self::GET_UNKNOWN;
                }
                break;
            case 422:
                $message = self::GET_NOT_FOUND.$this->getResponseMessage();
                break;
            default:
                $message = $this->getResponseMessage();
                break;
        }
        print_r($message . PHP_EOL);
    }

    public function paymentMethods(): void
    {
        switch ($this->response['status_code']) {
            case 401:
                $message = self::PAYMENT_UNAUTHORIZED;
                break;
            case 200:
            default:
                $message = $this->getResponseMessage();
                break;
        }
        print_r($message . PHP_EOL);
    }

    private function getResponseMessage(): string
    {
        if (isset($this->response['data']['message']) && !empty($this->response['data']['message'])) {
            return ' Details: ' . $this->response['data']['message'];
        }

        return '';
    }

}