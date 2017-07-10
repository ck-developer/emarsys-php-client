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
 * Class Contacts.
 *
 * @author Claude Khedhiri <claude@khedhiri.com>
 */
class Contacts extends AbstractApi
{
    /**
     * @param array $contact
     *
     * @return ResponseInterface
     */
    public function create(array $contact)
    {
        return $this->sendRequest($this->createCreateRequest($contact));
    }

    /**
     * @param array $contact
     *
     * @return Promise
     */
    public function asyncCreate(array $contact)
    {
        return $this->sendAsyncRequest($this->createCreateRequest($contact));
    }

    /**
     * @param array $contact
     *
     * @return ResponseInterface
     */
    public function update(array $contact)
    {
        return $this->sendRequest($this->createUpdateRequest($contact));
    }

    /**
     * @param array $contact
     *
     * @return Promise
     */
    public function asyncUpdate(array $contact)
    {
        return $this->sendAsyncRequest($this->createUpdateRequest($contact));
    }

    /**
     * @param array $contact
     *
     * @return ResponseInterface
     */
    public function updateOrCreate(array $contact)
    {
        return $this->sendRequest($this->createUpdateRequest($contact, 1));
    }

    /**
     * @param array $contact
     *
     * @return Promise
     */
    public function asyncUpdateOrCreate(array $contact)
    {
        return $this->sendAsyncRequest($this->createUpdateRequest($contact, 1));
    }

    /**
     * @param array $contacts
     *
     * @return \Psr\Http\Message\RequestInterface
     */
    private function createCreateRequest(array $contacts)
    {
        return $this->createRequest('POST', '/contact', $contacts);
    }

    /**
     * @param array $contacts
     * @param int   $createIfNotExists
     *
     * @return \Psr\Http\Message\RequestInterface
     */
    private function createUpdateRequest(array $contacts, $createIfNotExists = 0)
    {
        return $this->createRequest('PUT', "/contact?create_if_not_exists=$createIfNotExists", $contacts);
    }
}
