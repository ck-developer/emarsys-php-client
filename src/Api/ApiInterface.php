<?php

/*
 * A php library for using the Emarsys API.
 *
 * @link      https://github.com/ck-developer/emarsys-php-client
 * @package   authy
 * @license   MIT
 * @copyright Copyright (c) 2017 Claude Khedhiri <claude@khedhiri.com>
 */

namespace Emarsys\Api;

use Http\Client\Common\PluginClient;
use Http\Message\RequestFactory;

interface ApiInterface
{
    /**
     * @param PluginClient   $httpClient
     * @param RequestFactory $requestFactory
     */
    public function __construct(
        PluginClient $httpClient,
        RequestFactory $requestFactory
    );
}
