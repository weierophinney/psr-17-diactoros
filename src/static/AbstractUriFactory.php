<?php

namespace Mwop\Http\StaticFactories;

use Psr\Http\Message\UriInterface;
use Zend\Diactoros\Uri;

abstract class AbstractUriFactory
{
    /**
     * Do not allow instantiation
     */
    private function __construct()
    {
    }
        
    /**
     * @link \Psr\Http\Message\UriFactoryInterface::createUri
     */
    public static function createUri(string $uri = ''): UriInterface
    {
        return new Uri($uri);
    }
}
