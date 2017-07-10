<?php

/*
 * A php library for using the Emarsys API.
 *
 * @link      https://github.com/quitoque/emarsys-php-client
 * @package   emarsys-php-client
 * @license   MIT
 * @copyright Copyright (c) 2017 Quitoque <tech@quitoque.com>
 */

namespace Emarsys\Test\HttpClient;

use Emarsys\HttpClient\Builder;
use Emarsys\Test\TestCase;
use Http\Client\HttpAsyncClient;

/**
 * Class BuilderTest.
 *
 * @author Claude Khedhiri <claude@khedhiri.com>
 */
class BuilderTest extends TestCase
{
    public function testConstruct()
    {
        $builder = new Builder();
        $this->assertInstanceOf(Builder::class, $builder);
    }

    public function testGetHttpClient()
    {
        $builder = new Builder();
        $this->assertInstanceOf(HttpAsyncClient::class, $builder->getHttpClient());
    }
}
