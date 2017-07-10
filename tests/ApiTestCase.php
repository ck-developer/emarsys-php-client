<?php

/*
 * A php library for using the Emarsys API.
 *
 * @link      https://github.com/quitoque/emarsys-php-client
 * @package   emarsys-php-client
 * @license   MIT
 * @copyright Copyright (c) 2017 Quitoque <tech@quitoque.com>
 */

namespace Emarsys\Test;

/**
 * Class ApiTestCase.
 *
 * @author Claude Khedhiri <claude@khedhiri.com>
 */
class ApiTestCase extends TestCase
{
    /**
     * @var \PHPUnit_Framework_MockObject_MockObject
     */
    protected $api;

    protected function mockApi($class)
    {
        return $this->getMockBuilder($class)
            ->disableOriginalConstructor()
            ->getMock();
    }

    protected function mockApiResponse()
    {
        $this->api->method('sendRequest')
            ->willReturn('foo')
        ;
    }

    protected function mockApiAsyncResponse()
    {
        $this->api->expects($this->any())->method('sendAsyncRequest')
            ->willReturn('foo')
        ;
    }
}
