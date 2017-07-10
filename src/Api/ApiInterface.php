<?php

/*
 * A php library for using the Emarsys API.
 *
 * @link      https://github.com/quitoque/emarsys-php-client
 * @package   emarsys-php-client
 * @license   MIT
 * @copyright Copyright (c) 2017 Quitoque <tech@quitoque.com>
 */

namespace Emarsys\Api;

use Http\Client\Common\PluginClient;
use Http\Message\RequestFactory;

/**
 * Interface ApiInterface.
 *
 * @author Claude Khedhiri <claude@khedhiri.com>
 */
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
