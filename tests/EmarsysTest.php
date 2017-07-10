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

use Emarsys\Api;
use Emarsys\Emarsys;
use Emarsys\Exception\Api\NotFoundException;
use Emarsys\HttpClient\Builder;

/**
 * Class EmarsysTest.
 *
 * @author Claude Khedhiri <claude@khedhiri.com>
 */
class EmarsysTest extends TestCase
{
    /**
     * @var Emarsys
     */
    private $emarsys;

    /**
     * {@inheritdoc}
     */
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
