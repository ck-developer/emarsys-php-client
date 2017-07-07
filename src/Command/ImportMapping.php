<?php

/*
 * A php library for using the Emarsys API.
 *
 * @link      https://github.com/ck-developer/emarsys-php-client
 * @package   authy
 * @license   MIT
 * @copyright Copyright (c) 2017 Claude Khedhiri <claude@khedhiri.com>
 */

namespace Emarsys\Command;

use Emarsys\Emarsys;

class ImportMapping
{
    public function __construct(Emarsys $emarsys)
    {
        $this->emarsys = $emarsys;
    }

    public function import($path, $locale = 'en')
    {
        $response = $this->emarsys->fields()->all();
    }
}
