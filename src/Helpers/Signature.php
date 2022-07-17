<?php

namespace Src\Helpers;

class Signature
{
    /**
     * @param array $data
     * @param string $key
     * @param string $algorithm
     * @return string
     */
    public static function create(array $order, string $key, string $algorithm): string
    {
        ksort($order, SORT_STRING);
        $dataSet = array_values($order);
        $dataSet[] = $key;
        return hash($algorithm, implode(':', $dataSet));
    }
}