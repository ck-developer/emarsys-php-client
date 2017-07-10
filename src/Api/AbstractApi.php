<?php

/*
 * A php library for using the Emarsys API.
 *
 * @link      https://github.com/quitoque/emarsys-php-client
 * @package   emarsys-php-client
 * @license   MIT
 * @copyright Copyright (c) 2017 Quitoque <tech@quitoque.com>
 */

namespace Emarsys\Api;

use Http\Client\Common\PluginClient;
use Http\Client\HttpAsyncClient;
use Http\Message\RequestFactory;
use Http\Promise\Promise;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;

/**
 * Class AbstractApi.
 *
 * @author Claude Khedhiri <claude@khedhiri.com>
 */
abstract class AbstractApi implements ApiInterface
{
    /**
     * @var HttpAsyncClient
     */
    private $httpClient;

    /**
     * @var RequestFactory
     */
    private $requestFactory;

    /**
     * AbstractApi constructor.
     *
     * @param PluginClient   $httpClient
     * @param RequestFactory $requestFactory
     */
    public function __construct(PluginClient $httpClient, RequestFactory $requestFactory)
    {
        $this->httpClient = $httpClient;
        $this->requestFactory = $requestFactory;
    }

    /**
     * @param string     $method
     * @param string     $uri
     * @param array      $headers
     * @param array|null $body
     *
     * @return RequestInterface
     */
    protected function createRequest($method, $uri, array $headers = array(), $body = null)
    {
        return $this->requestFactory->createRequest(
            $method,
            $uri,
            $headers,
            $body
        );
    }

    /**
     * @param RequestInterface $request
     *
     * @return ResponseInterface
     */
    protected function sendRequest(RequestInterface $request)
    {
        return $this->httpClient->sendRequest($request);
    }

    /**
     * @param RequestInterface $request
     *
     * @return Promise
     */
    protected function sendAsyncRequest(RequestInterface $request)
    {
        return $this->httpClient->sendAsyncRequest($request);
    }
}
