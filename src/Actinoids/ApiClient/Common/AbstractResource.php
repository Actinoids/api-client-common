<?php

namespace Actinoids\ApiClient\Common;

/**
 * Abstract API resource.
 *
 * @author Jacob Bare <jacob.bare@gmail.com>
 */
abstract class AbstractResource
{
    /**
     * @var string
     */
    protected $key;

    /**
     * @var AbstractResourceClient
     */
    protected $root;

    /**
     * Constructor.
     *
     * @param   AbstractResourceClient  $root
     */
    public function __construct($key, AbstractResourceClient $root)
    {
        $this->key = $key;
        $this->root = $root;
    }

    /**
     * Gets the API resource key.
     *
     * @return  string
     */
    public function getKey()
    {
        return $this->key;
    }

    /**
     * Gets the Root API client instance.
     *
     * @return  AbstractResourceClient
     */
    public function getRoot()
    {
        return $this->root;
    }
}
