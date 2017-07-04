<?php

namespace Emarsys;

use Http\Client\Common\HttpMethodsClient;
use Http\Client\Common\PluginClient;
use Http\Client\HttpClient;
use Http\Discovery\HttpClientDiscovery;
use Http\Discovery\HttpAsyncClientDiscovery;
use Http\Discovery\MessageFactoryDiscovery;
use Http\Message\RequestFactory;
use Http\Client\Common\Plugin;

class ClientBuilder
{
    /**
     * @var
     */
    private $httpClient;

    /**
     * A HTTP client with all our plugins.
     *
     * @var PluginClient
     */
    private $pluginClient;

    /**
     * A HTTP Async client with all our plugins.
     *
     * @var PluginClient
     */
    private $pluginAsyncClient;

    /**
     * True if we should create a new Plugin client at next request.
     *
     * @var bool
     */
    private $httpClientModified = true;

    /**
     * @var Plugin[]
     */
    private $plugins = [];

    /**
     * @param HttpClient|null $httpClient Client to do HTTP requests, if not set, auto discovery will be used to find a HTTP client.
     * @param RequestFactory|null $requestFactory
     */
    public function __construct(
        HttpClient $httpClient = null,
        HttpClient $httpAsyncClient = null,
        RequestFactory $requestFactory = null

    ) {
        $this->httpClient = $httpClient ?: HttpClientDiscovery::find();
        $this->asyncHttpClient = $httpAsyncClient ?: HttpAsyncClientDiscovery::find();
        $this->requestFactory = $requestFactory ?: MessageFactoryDiscovery::find();
    }

    public function build()
    {
        $this->httpClientModified = false;

        $this->pluginClient = new HttpMethodsClient(
            new PluginClient($this->httpClient, $this->plugins),
            $this->requestFactory
        );

        $this->pluginAsyncClient = new PluginClient($this->asyncHttpClient, $this->plugins);
    }

    public function getHttpClient()
    {
        if ($this->httpClientModified) {
            $this->build();
        }

        return $this->pluginClient;
    }

    public function getAsyncHttpClient()
    {
        if ($this->httpClientModified) {
              $this->build();
        }

        return $this->pluginAsyncClient;
    }

    /**
     * Add a new plugin to the end of the plugin chain.
     *
     * @param Plugin $plugin
     */
    public function addPlugin(Plugin $plugin)
    {
        $this->plugins[] = $plugin;
        $this->httpClientModified = true;
    }

    /**
     * Remove a plugin by its fully qualified class name (FQCN).
     *
     * @param string $fqcn
     */
    public function removePlugin($fqcn)
    {
        foreach ($this->plugins as $idx => $plugin) {
            if ($plugin instanceof $fqcn) {
                unset($this->plugins[$idx]);
                $this->httpClientModified = true;
            }
        }
    }

    /**
     * Remove the cache plugin.
     */
    public function removeCache()
    {
        $this->cachePlugin = null;
        $this->httpClientModified = true;
    }

}
