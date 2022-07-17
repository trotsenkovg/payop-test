<?php

namespace Src\Http;

trait RequestTrait
{
    /**
     * @var array
     */
    private array $curl_option = [
        CURLOPT_CONNECTTIMEOUT => 60,
        CURLOPT_FOLLOWLOCATION => false,
        CURLOPT_HEADER => false,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_SSL_VERIFYHOST => 2,
        CURLOPT_SSL_VERIFYPEER => 1,
        CURLOPT_TIMEOUT => 60,
    ];

    /**
     * @param string $url
     * @param string $method
     * @param array $headers
     * @param array $data
     * @return array
     * @throws \Exception
     */
    public function request(string $url, string $method, array $headers, array $data = []): array
    {
        if (!$url) {
            throw new \Exception('URL is empty.');
        }

        $ch = curl_init($url);

        foreach ($this->curl_option as $option => $value) {
            curl_setopt($ch, $option, $value);
        }

        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, $method);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

        if ($data) {
            curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
        }

        $response = curl_exec($ch);

        if ($response === 'false') {
            $response = curl_error($ch);
        }

        $http_status = curl_getinfo($ch, CURLINFO_RESPONSE_CODE);
        curl_close($ch);

        return [$http_status, $response];
    }
}