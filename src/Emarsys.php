<?php

namespace Emarsys;

use Emarsys\HttpClient\Message\Authentication\Wsse;
use Http\Client\Common\HttpMethodsClient;
use Http\Client\Common\Plugin\AuthenticationPlugin;
use GuzzleHttp\Psr7\Request;

class Emarsys
{
    /**
     * @var HttpClient
     */
    private $httpClient;

    /**
     * @var HttpClient
     */
    private $asyncHttpClient;

    public function __construct($username, $apiKey)
    {
        $builder = new ClientBuilder();
        $builder->addPlugin(new AuthenticationPlugin(new Wsse($username, $apiKey)));
        $this->httpClient = $builder->getHttpClient();
        $this->asyncHttpClient = $builder->getAsyncHttpClient();
    }

    public function getHttpClient()
    {
       return $this->httpClient;
    }

    public function getAsyncHttpClient()
    {
       return $this->asyncHttpClient;
    }

}
