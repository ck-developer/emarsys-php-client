<?php

/*
 * A php library for using the Emarsys API.
 *
 * @link      https://github.com/quitoque/emarsys-php-client
 * @package   emarsys-php-client
 * @license   MIT
 * @copyright Copyright (c) 2017 Quitoque <tech@quitoque.com>
 */

namespace Emarsys\Exception\Mapping;

use Emarsys\Exception\EmarsysException;

/**
 * Class NotFoundFieldException.
 *
 * @author Claude Khedhiri <claude@khedhiri.com>
 */
class NotFoundFieldException extends \InvalidArgumentException implements EmarsysException
{
    public function __construct($field)
    {
        parent::__construct(sprintf('Not found %s field on mapping', $field), 0, null);
    }
}
