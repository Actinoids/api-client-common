<?php

namespace Actinoids\ApiClient\Common;

/**
 * Abstract API client that utilizes API resource objects.
 *
 * @author Jacob Bare <jacob.bare@gmail.com>
 */
abstract class AbstractResourceClient extends AbstractApiClient
{
    /**
     * Registered API resources.
     *
     * @var AbstractResource[]
     */
    protected $resources = [];

    /**
     * Adds an API resource to the client.
     *
     * @param   AbstractResource    $resource
     * @return  self
     */
    protected function addResource(AbstractResource $resource)
    {
        $this->resources[$resource->getKey()] = $resource;
        return $this;
    }

    /**
     * Gets an API resource
     *
     * @param   string  $key
     * @return  AbstractResource
     * @throws  ApiClientException If resource is not found.
     */
    public function getResource($key)
    {
        if (false === $this->hasResource($key)) {
            throw ApiClientException::resourceNotFound($key);
        }
        return $this->resources[$key];
    }

    /**
     * Determines if the API client as a resource.
     *
     * @param   string  $key
     * @return  bool
     */
    public function hasResource($key)
    {
        return isset($this->resources[$key]);
    }
}
