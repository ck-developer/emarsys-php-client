<?php

/*
 * A php library for using the Emarsys API.
 *
 * @link      https://github.com/quitoque/emarsys-php-client
 * @package   emarsys-php-client
 * @license   MIT
 * @copyright Copyright (c) 2017 Quitoque <tech@quitoque.com>
 */

namespace Emarsys;

use Emarsys\Api\ApiInterface;
use Emarsys\Exception\Api\LogicException;
use Emarsys\Exception\Api\NotFoundException;
use Emarsys\HttpClient\Builder;
use Http\Client\Common\PluginClient;
use Http\Message\MessageFactory;

/**
 * Class Emarsys.
 *
 * @author Claude Khedhiri <claude@khedhiri.com>
 *
 * @method Api\Contacts contacts()
 * @method Api\Fields fields()
 */
class Emarsys
{
    /**
     * @var PluginClient
     */
    private $httpClient;

    /**
     * @var Builder
     */
    private $httpBuilder;

    /**
     * @var MessageFactory
     */
    private $requestFactory;

    public function __construct($username, $secret)
    {
        $this->parameters = array(
            'username' => $username,
            'secret' => $username,
        );
    }

    public function __call($name, $arguments)
    {
        $class = sprintf('\Emarsys\Api\%s', ucfirst($name));

        if (false === class_exists($class)) {
            throw  new NotFoundException($class);
        }

        if ($class instanceof ApiInterface) {
            throw new LogicException(sprintf('%s must be extend Emarsys\Api\ApiInterface'));
        }

        $this->initialize();

        $class = new $class(
            $this->httpClient,
            $this->requestFactory
        );

        return $class;
    }

    /**
     * @param $httpBuilder
     */
    public function setHttpBuilder($httpBuilder)
    {
        $this->httpBuilder = $httpBuilder;
    }

    private function initialize()
    {
        if (null !== $this->httpClient && null !== $this->requestFactory) {
            return;
        }

        if (null === $this->httpBuilder) {
            $this->httpBuilder = new Builder();
        }

        $this->httpBuilder->setParameters($this->parameters);

        $this->httpClient = $this->httpBuilder->getHttpClient();
        $this->requestFactory = $this->httpBuilder->getRequestFactory();
    }
}
