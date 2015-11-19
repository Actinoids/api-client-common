<?php

namespace Actinoids\ApiClient\Common;

/**
 * Standard API client implementation details.
 *
 * @author Jacob Bare <jacob.bare@gmail.com>
 */
interface ApiClientInterface
{
    /**
     * Gets the configuration options for the implementing API client.
     *
     * @return  Configuration|null
     */
    public function getConfig();

    /**
     * Sets the configuration options for the implementing API client.
     *
     * @param   Configuration   $config
     * @return  self
     */
    public function setConfig(Configuration $config);

    /**
     * Determines if the API instance has a valid configuration
     *
     * @return bool
     */
    public function hasValidConfig();
}
