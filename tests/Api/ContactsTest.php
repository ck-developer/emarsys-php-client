<?php

/*
 * A php library for using the Emarsys API.
 *
 * @link      https://github.com/quitoque/emarsys-php-client
 * @package   emarsys-php-client
 * @license   MIT
 * @copyright Copyright (c) 2017 Quitoque <tech@quitoque.com>
 */

namespace Emarsys\Test\Api;

use Emarsys\Api\Contacts;
use Emarsys\Test\ApiTestCase;

/**
 * Class ContactsTest.
 *
 * @author Claude Khedhiri <claude@khedhiri.com>
 */
class ContactsTest extends ApiTestCase
{
    /**
     * @var Contacts
     */
    protected $api;

    protected function setUp()
    {
        $this->api = $this->mockApi(Contacts::class);
    }

    public function testListWithSuccess()
    {
        $this->mockApiResponse();

        var_dump($this->api->create(array()));
    }
}
