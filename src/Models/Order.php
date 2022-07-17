<?php

namespace Src\Models;

class Order
{
    /**
     * @var string
     */
    private string $id;
    /**
     * @var string
     */
    private string $amount;

    /**
     * @var string
     */
    private string $currency;

    /**
     * @var string
     */
    private string $description;

    /**
     * @var array
     */
    private array $items;

    /**
     * @param string $id
     * @param string $amount
     * @param string $currency
     * @param array $items
     * @param string $description
     * @throws \Exception
     */
    public function __construct(string $id, string $amount, string $currency, array $items, string $description = '')
    {
        $this->id           = $id;
        $this->amount       = $amount;
        $this->currency     = $currency;
        $this->items        = $items;
        $this->description  = $description;

        $this->validate();
    }

    /**
     * @return array
     */
    public function getInfo(): array
    {
        return array_filter([
            'id'            => $this->id,
            'amount'        => $this->amount,
            'currency'      => $this->currency,
            'items'         => $this->items,
            'description'   => $this->description,
        ]);
    }

    /**
     * @return array
     */
    public function getSignInfo(): array
    {
        return [
            'id'            => $this->id,
            'amount'        => $this->amount,
            'currency'      => $this->currency,
        ];
    }

    /**
     * @return void
     * @throws \Exception
     */
    private function validate(): void
    {
        if (!$this->id || !$this->amount || !$this->currency || !$this->items) {
            throw new \Exception('Order: Required parameter(s) cannot be blank.');
        }
    }
}