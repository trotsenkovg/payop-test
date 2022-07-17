<?php

namespace Src\Console;


class Application extends ConsoleApp {

    public function __construct(array $config)
    {
        parent::__construct($config);
    }

    public function __invoke()
    {
        $method = $this->methodName;
        $this->resource->$method($this->client);
    }

}