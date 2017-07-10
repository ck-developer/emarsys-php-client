<?php

/*
 * A php library for using the Emarsys API.
 *
 * @link      https://github.com/quitoque/emarsys-php-client
 * @package   emarsys-php-client
 * @license   MIT
 * @copyright Copyright (c) 2017 Quitoque <tech@quitoque.com>
 */

namespace Emarsys\HttpClient;

use Emarsys\HttpClient\Message\Authentication\Wsse;
use Http\Client\Common\Plugin;
use Http\Client\Common\PluginClient;
use Http\Client\HttpAsyncClient;
use Http\Discovery\HttpAsyncClientDiscovery;
use Http\Discovery\MessageFactoryDiscovery;
use Http\Discovery\UriFactoryDiscovery;
use Http\Message\MessageFactory;
use Http\Message\RequestFactory;
use Symfony\Component\OptionsResolver\OptionsResolver;

/**
 * Class Builder.
 *
 * @author Claude Khedhiri <claude@khedhiri.com>
 */
class Builder
{
    /**
     * @var HttpAsyncClient
     */
    private $httpClient;

    /**
     * @var array
     */
    private $parameters;

    /**
     * @var MessageFactory
     */
    private $requestFactory;

    /**
     * A HTTP client with all our plugins.
     *
     * @var PluginClient
     */
    private $pluginClient;

    /**
     * True if we should create a new Plugin client at next request.
     *
     * @var bool
     */
    private $httpClientModified = true;

    /**
     * @var Plugin[]
     */
    private $plugins = array();

    /**
     * @param array                $parameters
     * @param HttpAsyncClient|null $httpAsyncClient
     * @param RequestFactory|null  $requestFactory
     */
    public function __construct(
        array $parameters = array(),
        HttpAsyncClient $httpAsyncClient = null,
        RequestFactory $requestFactory = null
    ) {
        $this->httpClient = $httpAsyncClient ?: HttpAsyncClientDiscovery::find();
        $this->requestFactory = $requestFactory ?: MessageFactoryDiscovery::find();
    }

    /**
     * @param HttpAsyncClient $httpAsyncClient
     */
    public function setHttpClient(HttpAsyncClient $httpAsyncClient)
    {
        $this->httpClient = $httpAsyncClient;
    }

    /**
     * @param MessageFactory $requestFactory
     */
    public function setRequestFactory($requestFactory)
    {
        $this->requestFactory = $requestFactory;
    }

    /**
     * @param array $parameters
     */
    public function setParameters(array $parameters)
    {
        $this->parameters = $parameters;
    }

    public function resolveParameters()
    {
        $resolver = new OptionsResolver();
        $resolver->setRequired('username');
        $resolver->setRequired('secret');

        $this->parameters = $resolver->resolve($this->parameters);
    }

    /**
     * @return PluginClient
     */
    public function getHttpClient()
    {
        if ($this->httpClientModified) {
            $this->addPlugin(new Plugin\AuthenticationPlugin(new Wsse(
                    $this->parameters['username'],
                    $this->parameters['secret'])
            ));

            $this->addPlugin(new Plugin\BaseUriPlugin(
                    UriFactoryDiscovery::find()->createUri('https://api.emarsys.net/api/v2'))
            );

            $this->addPlugin(new Plugin\HeaderDefaultsPlugin(array(
                'User-Agent' => 'emarsys-php-client (https://github.com/ck-developer/emarsys-php-client)',
            )));

            $this->httpClientModified = false;
            $this->pluginClient = new PluginClient($this->httpClient, $this->plugins);
        }

        return $this->pluginClient;
    }

    /**
     * @return MessageFactory
     */
    public function getRequestFactory()
    {
        return $this->requestFactory;
    }

    /**
     * Add a new plugin to the end of the plugin chain.
     *
     * @param Plugin $plugin
     */
    public function addPlugin(Plugin $plugin)
    {
        $this->plugins[get_class($plugin)] = $plugin;
        $this->httpClientModified = true;
    }

    /**
     * Remove a plugin by its fully qualified class name.
     *
     * @param string $class
     */
    public function removePlugin($class)
    {
        if (array_key_exists($class, $this->plugins)) {
            unset($this->plugins[$class]);
        }
    }
}
