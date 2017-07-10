<?php

/*
 * A php library for using the Emarsys API.
 *
 * @link      https://github.com/quitoque/emarsys-php-client
 * @package   emarsys-php-client
 * @license   MIT
 * @copyright Copyright (c) 2017 Quitoque <tech@quitoque.com>
 */

namespace Emarsys\Exception\Api;

use Emarsys\Exception\EmarsysException;

/**
 * Class LogicException.
 *
 * @author Claude Khedhiri <claude@khedhiri.com>
 */
class LogicException extends \LogicException implements EmarsysException
{
}
