<?php

namespace Src\Http;

use Exception;

trait Configuration
{
    /**
     * Authorization Header
     * @var string
     */
    private string $token;

    /**
     * Base API path
     * @var string
     */
    private string $apiUrl;

    /**
     * Algorithm
     * @var string
     */
    private string $algorithm;

    /**
     * @var string
     */
    private string $publicKey;

    /**
     * @var string
     */
    private string $language;

    /**
     * @var string
     */
    private string $secretKey;

    /**
     * @var string
     */
    private string $project_id;


    /**
     * @return string
     */
    public function getToken(): string
    {
        return $this->token;
    }

    /**
     * @return string
     */
    public function getApiUrl(): string
    {
        return $this->apiUrl;
    }

    /**
     * @return string
     */
    public function getAlgorithm(): string
    {
        return $this->algorithm;
    }

    /**
     * @return string
     */
    public function getPublicKey(): string
    {
        return $this->publicKey;
    }

    public function getSecretKey(): string
    {
        return $this->secretKey;
    }

    /**
     * @return string
     */
    public function getLanguage(): string
    {
        return $this->language;
    }

    /**
     * @return string
     */
    public function getProjectId(): string
    {
        return $this->project_id;
    }

    /**
     * @param array $config
     * @return void
     * @throws \Exception
     */
    private function parseConfig(array $config): void
    {
        //Set base API url & version
        if (!$config['api_url'] || !$config['api_version']) {
            throw new Exception('API url or version parameters is not define. Please check config file.');
        }

        $this->apiUrl = $config['api_url'] . $config['api_version'];

        //Set algorithm
        if (!$config['algorithm']) {
            throw new Exception('Algorithm parameter is not define. Please check config file.');
        }

        $this->algorithm = $config['algorithm'];

        //Set JWT token
        if (!$config['token']) {
            throw new Exception('JWT token is not define. Please check config file.');
        }

        $this->token = $config['token'];

        //Set public key
        if (!$config['public_key']) {
            throw new Exception('Public Key is not define. Please check config file.');
        }

        $this->publicKey = $config['public_key'];

        //Set secret key
        if (!$config['secret_key']) {
            throw new Exception('Secret Key is not define. Please check config file.');
        }

        $this->secretKey = $config['secret_key'];

        //Set language
        if (!$config['language']) {
            throw new Exception('Language is not define. Please check config file.');
        }

        $this->language = $config['language'];

        //Set Project ID
        if (!$config['project_id']) {
            throw new Exception('Project ID is not define. Please check config file.');
        }

        $this->project_id = $config['project_id'];
    }
}