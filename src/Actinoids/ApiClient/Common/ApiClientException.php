<?php
namespace Actinoids\ApiClient\Common;

use \Exception;

/**
 * Generic API Client Exceptions.
 *
 * @author Jacob Bare <jacob.bare@gmail.com>
 */
class ApiClientException extends Exception
{
    public static function invalidConfiguration(array $required)
    {
        return new self(sprintf('The API configuration is not valid. The following options must be set: %s', implode(', ', $required)));
    }

    public static function invalidRequestMethod($method, array $supported)
    {
        return new self(sprintf('The request method %s is not allowed. Only %s methods are supported.'), $method, implode(', ', $supported));
    }

    public static function resourceNotFound($key)
    {
        return new self(sprintf('The API resource "%s" was not found.', $key));
    }
}
