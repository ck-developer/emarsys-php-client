<?php

/*
 * A php library for using the Emarsys API.
 *
 * @link      https://github.com/ck-developer/emarsys-php-client
 * @package   authy
 * @license   MIT
 * @copyright Copyright (c) 2017 Claude Khedhiri <claude@khedhiri.com>
 */

namespace Emarsys\Exception\Mapping;

use Emarsys\Exception\EmarsysException;

class NotFoundFieldException extends \InvalidArgumentException implements EmarsysException
{
    public function __construct($field)
    {
        parent::__construct(sprintf('Not found %s field on mapping', $field), 0, null);
    }
}
