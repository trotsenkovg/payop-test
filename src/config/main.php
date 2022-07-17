<?php

return [
    'api_url'       => 'https://payop.com',
    'api_version'   => '/v1',

    'algorithm'     => 'sha256',
    'token'         => 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpZCI6ODA1NDksImFjY2Vzc1Rva2VuIjoiY2E1Y2Q2MGE5YjI0ZjM0YWVhZmI4ODAyIiwidG9rZW5JZCI6MjkxNiwid2FsbGV0SWQiOjcyNjg3LCJ0aW1lIjoxNjU4MDU5NTY5LCJleHBpcmVkQXQiOjE2NTkyMTg0MDAsInJvbGVzIjpbMV0sInR3b0ZhY3RvciI6eyJwYXNzZWQiOmZhbHNlfX0.blrP5qpXbYeb1m6arKj6fjTqIeAh9HG4zE7rHADR7dg',

    'result_url'    => 'https://test.example/result-page',
    'fail_url'      => 'https://test.example/fail-page',

    'public_key'    => 'PayOp',
    'secret_key'    => 'supersecretkey',
    'project_id'    => '11q0o-9ie3-38eur48u-5t7y-69ij',

    'language'      => 'en',

    'trusted_proxy' => ['52.49.204.201', '54.229.170.212', '127.0.0.1']
];
