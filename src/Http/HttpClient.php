<?php

namespace Src\Http;

use Exception;

class HttpClient
{
    use RequestTrait;
    use ResponseTrait;
    use Configuration;

    /**
     * @param array $config
     * @throws Exception
     */
    public function __construct(array $config)
    {
        $this->parseConfig($config);
    }

    /**
     * @param string $url
     * @param string $method
     * @param array $data
     * @return void
     * @throws Exception
     */
    public function execute(string $url, string $method, array $data = []): array
    {
        $full_path  = $this->apiUrl.$url;
        $headers    = $this->getHeader();

        try {
            if ($result = $this->request($full_path, $method, $headers, $data)) {
                return $this->handleResponse($result);
            }
        } catch (Exception $e) {
            throw new Exception($e->getMessage());
        }
    }

    /**
     * @return string[]
     */
    private function getHeader(): array
    {
        return [
            'Content-Type: application/json'
        ];
    }
}