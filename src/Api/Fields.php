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

use Http\Promise\Promise;
use Psr\Http\Message\ResponseInterface;

/**
 * Class Fields.
 *
 * @author Claude Khedhiri <claude@khedhiri.com>
 */
class Fields extends AbstractApi
{
    /**
     * @param string $locale
     *
     * @return ResponseInterface
     */
    public function all($locale = 'en')
    {
        return $this->sendRequest($this->createAllRequest($locale));
    }

    /**
     * @param string $locale
     *
     * @return Promise
     */
    public function asyncAll($locale = 'en')
    {
        return $this->sendAsyncRequest($this->createAllRequest($locale));
    }

    /**
     * @param string $locale
     *
     * @return \Psr\Http\Message\RequestInterface
     */
    private function createAllRequest($locale = 'en')
    {
        return $this->createRequest('GET', "/fields/translate/$locale");
    }
}
