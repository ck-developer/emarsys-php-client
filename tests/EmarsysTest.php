<?php

/*
 * A php library for using the Authy API.
 *
 * @link      https://github.com/ck-developer/authy
 * @package   authy
 * @license   MIT
 * @copyright Copyright (c) 2016 Claude Khedhiri <claude@khedhiri.com>
 */

namespace Emarsys\Test;

use Emarsys\Emarsys;

class EmarsysTest extends TestCase
{
    public function testConstruct()
    {
        $username = 'test';
        $key = 'secret';

        $emarsys = new Emarsys($username, $key);
    }
}
