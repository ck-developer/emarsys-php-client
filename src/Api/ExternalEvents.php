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
 * Class Events.
 *
 * @author Claude Khedhiri <claude@khedhiri.com>
 */
class ExternalEvents extends AbstractApi
{
    /**
     * @param $eventId
     *
     * @return ResponseInterface
     */
    public function create($eventId)
    {
        return $this->sendRequest($this->createCreateRequest($eventId));
    }

    /**
     * @param $eventId
     *
     * @return Promise
     */
    public function asyncCreate($eventId)
    {
        return $this->sendAsyncRequest($this->createCreateRequest($eventId));
    }

    /**
     * @param int   $eventId
     * @param array $data
     *
     * @return ResponseInterface
     */
    public function trigger($eventId, $data = array())
    {
        return $this->sendRequest($this->createTriggerRequest($eventId, $data));
    }

    /**
     * @param int   $eventId
     * @param array $data
     *
     * @return Promise
     */
    public function asyncTrigger($eventId, $data = array())
    {
        return $this->sendAsyncRequest($this->createTriggerRequest($eventId, $data));
    }

    /**
     * @param int   $eventId
     * @param array $data
     *
     * @return \Psr\Http\Message\RequestInterface
     */
    private function createCreateRequest($eventId, $data = array())
    {
        return $this->createRequest('POST', "/event/$eventId/trigger", $data);
    }

    /**
     * @param int   $eventId
     * @param array $data
     *
     * @return \Psr\Http\Message\RequestInterface
     */
    private function createTriggerRequest($eventId, $data = array())
    {
        return $this->createRequest('POST', "/event/$eventId/trigger", $data);
    }
}
