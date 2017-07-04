<?php

namespace Emarsys\Test;

use Emarsys\ClientBuilder;
use Http\Client\HttpClient;

class ClientBuilderTest extends TestCase
{
    public function testConstruct()
    {
        $builder = new ClientBuilder();

        $this->assertInstanceOf(ClientBuilder::class, $builder);
    }

    public function testDefaultHttpClient()
    {
        $builder = new ClientBuilder();
        $httpClient = $builder->getHttpClient();

        $this->assertInstanceOf(HttpClient::class, $httpClient);
    }

    public function testAsyncHttpClient()
    {
        $builder = new ClientBuilder();
        $asyncHttpClient = $builder->getAsyncHttpClient();

        $this->assertInstanceOf(HttpClient::class, $asyncHttpClient);
    }
}
