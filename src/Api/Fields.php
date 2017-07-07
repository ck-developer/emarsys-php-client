<?php

/*
 * A php library for using the Emarsys API.
 *
 * @link      https://github.com/ck-developer/emarsys-php-client
 * @package   authy
 * @license   MIT
 * @copyright Copyright (c) 2017 Claude Khedhiri <claude@khedhiri.com>
 */

namespace Emarsys\Api;

use Http\Promise\Promise;
use Psr\Http\Message\ResponseInterface;

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
