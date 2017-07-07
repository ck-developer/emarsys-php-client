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

class ContactLists extends AbstractApi
{
    /**
     * @param string $listId
     * @param array  $contacts
     *
     * @return ResponseInterface
     */
    public function addContacts($listId, $contacts)
    {
        return $this->sendRequest($this->createAddContactsRequest($listId, $contacts));
    }

    /**
     * @param string $listId
     * @param array  $contacts
     *
     * @return Promise
     */
    public function asyncAll($listId, $contacts)
    {
        return $this->sendAsyncRequest($this->createAddContactsRequest($listId, $contacts));
    }

    /**
     * @param string $listId
     * @param array  $contacts
     *
     * @return \Psr\Http\Message\RequestInterface
     */
    private function createAddContactsRequest($listId, $contacts)
    {
        return $this->createRequest('POST', "/contactlist/$listId/", $contacts);
    }
}
