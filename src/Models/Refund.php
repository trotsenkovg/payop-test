<?php

namespace Models;

class Refund
{
    /**
     * @var string
     */
    private string $transactionId;

    /**
     * @var string
     */
    private string $type;

    /**
     * @var int
     */
    private int $amount;

    /**
     * @var array
     */
    private array $metadata;

    /**
     * @param string $transactionId
     * @param $type
     * @param $amount
     * @param array $metadata
     */
    public function __construct(string $transactionId, $type, $amount, array $metadata = [])
    {
        $this->transactionId    = $transactionId;
        $this->type             = $type;
        $this->amount           = $amount;
        $this->metadata         = $metadata;
    }

    /**
     * @return array
     */
    public function getInfo(): array
    {
        return [
            'transactionId'     => $this->transactionId,
            'refundType'        => $this->type,
            'amount'            => $this->amount,
            'metadata'          => $this->metadata,
        ];
    }

}