<?php

namespace Mwop\Http\TraitFactories;

use Psr\Http\Message\UriInterface;
use Zend\Diactoros\Uri;

trait UriFactoryTrait
{
    /**
     * @link \Psr\Http\Message\UriFactoryInterface::createUri
     */
    public function createUri(string $uri = ''): UriInterface
    {
        return new Uri($uri);
    }
}
