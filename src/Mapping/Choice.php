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

class Choice
{
    /**
     * @var array
     */
    private $mapping = array();

    /**
     * @var array
     */
    private $systemFields = array();

    /**
     * @var Fields
     */
    private $fields;

    public function initialize(Fields $fields)
    {
        $this->fields = $fields;
        $this->systemFields = require __DIR__.'/../../config/choices.php';
    }

    /**
     * @param array $mapping
     */
    public function addMapping(array $mapping)
    {
        $this->mapping = array_merge($this->mapping, $mapping);
    }

    /**
     * @param $name
     *
     * @return array
     */
    public function find($name)
    {
        if (is_string($name)) {
            return $this->findByName($name);
        }
    }

    /**
     * @param $name
     *
     * @return array
     */
    public function findByName($name)
    {
        if (array_key_exists($name, $this->systemFields)) {
            return $this->systemFields[$name];
        }

        if (array_key_exists($name, $this->mapping)) {
            return $this->mapping[$name];
        }

        throw new NotFoundFieldException($name);
    }

    /**
     * @param $name
     * @param mixed $field
     *
     * @return array
     */
    public function findByField($field)
    {
        $this->fields->find($field);
    }
}
