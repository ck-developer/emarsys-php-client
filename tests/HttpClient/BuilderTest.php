<?php

/*
 * A php library for using the Emarsys API.
 *
 * @link      https://github.com/ck-developer/emarsys-php-client
 * @package   authy
 * @license   MIT
 * @copyright Copyright (c) 2017 Claude Khedhiri <claude@khedhiri.com>
 */

namespace Emarsys\Test\HttpClient;

use Emarsys\HttpClient\Builder;
use Emarsys\Test\TestCase;
use Http\Client\HttpAsyncClient;

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
