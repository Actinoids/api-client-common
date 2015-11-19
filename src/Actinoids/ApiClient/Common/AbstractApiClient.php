<?php

namespace Actinoids\ApiClient\Common;

use GuzzleHttp\Message\Response;
use GuzzleHttp\Message\Request;
use GuzzleHttp\Client;

/**
 * Abstract API client with common/generic functionality.
 *
 * @author Jacob Bare <jacob.bare@gmail.com>
 */
abstract class AbstractApiClient implements ApiClientInterface
{
    /**
     * The Guzzle client for sending requests.
     *
     * @var Client
     */
    protected $client;

    /**
     * The configuration options.
     *
     * @var Configuration|null
     */
    protected $config;

    /**
     * An array of required configuration options.
     *
     * @var array
     */
    protected $requiredConfigOptions = [];

    /**
     * Constructor. Sets the configuration for this Omeda API client instance.
     *
     * @param   Configuration   $config     The config options.
     */
    public function __construct(Configuration $config)
    {
        $this->config = $config;
        if (false === $this->hasValidConfig()) {
            throw ApiClientException::invalidConfiguration($this->requiredConfigOptions);
        }
        $this->initClient();
    }

    /**
     * Instantiates and initializes the Guzzle client.
     *
     * @return  self
     */
    abstract protected function initClient();

    /**
     * {@inheritDoc}
     */
    public function getConfig()
    {
        return $this->config;
    }

    /**
     * {@inheritDoc}
     */
    public function hasValidConfig()
    {
        $config = $this->getConfig();
        if (null === $config) {
            return empty($this->requiredConfigOptions);
        }
        foreach ($this->requiredConfigOptions as $option) {
            if (false === $this->config->has($option)) {
                return false;
            }
        }
        return true;
    }

    /**
     * Takes a Request object and performs the request via the client.
     *
     * @param   Request     $request
     * @return  Response    $response
     * @throws  ApiClientException  On errors
     */
    protected function sendRequest(Request $request)
    {
        return $this->client->send($request);
    }

    /**
     * {@inheritDoc}
     */
    public function setConfig(Configuration $config)
    {
        $this->config = $config;
        return $this;
    }
}
