<?php

/*
 * A php library for using the Emarsys API.
 *
 * @link      https://github.com/ck-developer/emarsys-php-client
 * @package   authy
 * @license   MIT
 * @copyright Copyright (c) 2017 Claude Khedhiri <claude@khedhiri.com>
 */

namespace Emarsys\Test;

use Emarsys\Api;
use Emarsys\Emarsys;
use Emarsys\Exception\Api\NotFoundException;
use Emarsys\HttpClient\Builder;

class EmarsysTest extends TestCase
{
    /**
     * @var Emarsys
     */
    private $emarsys;

    public function setUp()
    {
        $this->emarsys = new Emarsys('username', 'secret');
    }

    public function testConstruct()
    {
        $this->assertInstanceOf(Emarsys::class, $this->emarsys);
    }

    public function testContactApi()
    {
        $this->assertInstanceOf(Api\Contacts::class, $this->emarsys->contacts());
    }

    public function testFieldsApi()
    {
        $this->assertInstanceOf(Api\Fields::class, $this->emarsys->fields());
    }

    public function testApiNotFoundException()
    {
        $this->expectException(NotFoundException::class);

        $this->emarsys->notfound();
    }

    public function testHttpBuilder()
    {
        $exceptedBuilder = $this->getMockClass(Builder::class);
        $this->emarsys->setHttpBuilder($exceptedBuilder);

        $reflected = new \ReflectionClass($this->emarsys);

        $builder = $reflected->getProperty('httpBuilder');
        $builder->setAccessible(true);

        $this->assertSame($exceptedBuilder, $builder->getValue($this->emarsys));
    }

    public function testHttpBuilderSetter()
    {
        $exceptedBuilder = $this->getMockClass(Builder::class);
        $this->emarsys->setHttpBuilder($exceptedBuilder);

        $reflected = new \ReflectionClass($this->emarsys);

        $builder = $reflected->getProperty('httpBuilder');
        $builder->setAccessible(true);

        $this->assertSame($exceptedBuilder, $builder->getValue($this->emarsys));
    }
}
