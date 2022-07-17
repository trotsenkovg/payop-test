<?php

namespace Src\Console;

use Exception;
use Src\Http\HttpClient;

abstract class ConsoleApp
{
    private const RESOURCE_PATH = __DIR__. '/../Api/Payop/v1/';

    protected HttpClient $client;
    protected object $resource;
    protected string $methodName;

    /**
     * @param array $config
     * @throws Exception
     */
    public function __construct(array $config)
    {
        $this->client = new HttpClient($config);
        $this->parseConsoleArgs();
    }

    /**
     * @throws Exception
     */
    private function parseConsoleArgs()
    {
        $argv       = $_SERVER['argv'];
        $resource   = $argv[1];
        $method     = $argv[2];

        if (!$resource) {
            throw new Exception('Empty API resource name.');
        }

        if (!$method) {
            throw new Exception('Empty API method name.');
        }

        $this->setResourceObject($resource);
        $this->setMethodName($method);
    }

    /**
     * @param string $resource
     * @return void
     * @throws Exception
     */
    private function setResourceObject(string $resource): void
    {
        if (is_dir(self::RESOURCE_PATH.$resource)
            && file_exists(self::RESOURCE_PATH.$resource.'/'.$resource.'.php'))
        {
            try {
                $classname = 'Src\Api\Payop\v1\\'.$resource.'\\'.$resource;
                $this->resource = new $classname;
            } catch (Exception $e) {
                throw new Exception($e->getMessage(), PHP_EOL);
            }
        } else {
            throw new Exception('Resource not found.');
        }
    }

    /**
     * @param $method
     * @return void
     * @throws Exception
     */
    private function setMethodName($method): void
    {
        if (!method_exists($this->resource, $method)) {
            throw new Exception("`$method` method is not exist.");
        }

        $this->methodName = $method;
    }
}