<?php

/*
 * A php library for using the Emarsys API.
 *
 * @link      https://github.com/ck-developer/emarsys-php-client
 * @package   authy
 * @license   MIT
 * @copyright Copyright (c) 2017 Claude Khedhiri <claude@khedhiri.com>
 */

namespace Emarsys\Mapping;

use Emarsys\Exception\Mapping\NotFoundFieldException;
use Emarsys\Test\TestCase;

class FieldTest extends TestCase
{
    /**
     * @var Fields
     */
    private $fields;

    public function setUp()
    {
        $this->fields = new Fields();
    }

    public function testAddMapping()
    {
        $this->fields->addMapping(array(
            'field' => 1,
        ));

        $this->assertSame(1, $this->fields->find('field'));
    }

    public function testFindIdByName()
    {
        $this->assertSame(0, $this->fields->find('id'));
    }

    public function testFindEmailByName()
    {
        $this->assertSame(3, $this->fields->find('email'));
    }

    public function testFindWithNotFoundException()
    {
        $this->expectException(NotFoundFieldException::class);

        $this->fields->find('not_found_field');
    }
}
