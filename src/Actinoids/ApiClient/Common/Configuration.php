<?php

namespace Actinoids\ApiClient\Common;

/**
 * Generic configuration values.
 *
 * @author Jacob Bare <jacob.bare@gmail.com>
 */
class Configuration
{
    /**
     * The configuration parameters.
     *
     * @var array
     */
    private $parameters = [];

    /**
     * Constructor.
     *
     * @param   array   $parameters
     */
    public function __construct(array $parameters = [])
    {
        $this->replace($parameters);
    }

    /**
     * Gets a configuration value.
     *
     * @param   string  $key
     * @return  mixed
     */
    public function get($key)
    {
        if (isset($this->parameters[$key])) {
            return $this->parameters[$key];
        }
        return null;
    }

    /**
     * Determines if a configuration value exists.
     *
     * @return  bool
     */
    public function has($key)
    {
        return null !== $this->get($key);
    }

    /**
     * Replaces all configuration values.
     *
     * @param   array   $paramters
     * @return  self
     */
    public function replace(array $parameters = [])
    {
        $this->parameters = $parameters;
        return $this;
    }

    /**
     * Sets a configuration value.
     *
     * @param   string  $key
     * @param   mixed   $value
     * @return  self
     */
    public function set($key, $value)
    {
        $this->parameters[$key] = $value;
        return $this;
    }
}
