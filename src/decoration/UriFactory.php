<?php

namespace Mwop\Http\DecoratedFactories;

use Psr\Http\Message\UriFactoryInterface;
use Psr\Http\Message\UriInterface;
use Zend\Diactoros\Uri;

class UriFactory implements UriFactoryInterface
{
    /**
     * {@inheritDoc}
     */
    public function createUri(string $uri = ''): UriInterface
    {
        return new Uri($uri);
    }
}
