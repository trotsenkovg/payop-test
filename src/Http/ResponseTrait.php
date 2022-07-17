<?php

namespace Src\Http;

trait ResponseTrait
{
    /**
     * @param array $res
     * @return array
     */
    public function handleResponse(array $res): array
    {
        $http_code  = (int)$res[0];
        $content    = json_decode($res[1], true);

        return[
            'status_code'   => $http_code,
            'data'          => $content
        ];
    }
}