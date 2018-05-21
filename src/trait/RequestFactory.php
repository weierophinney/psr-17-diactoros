<?php

namespace Mwop\Http\TraitFactories;

use InvalidArgumentException;
use Psr\Http\Message\RequestFactoryInterface;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\UriInterface;
use Zend\Diactoros\Request;

class RequestFactory implements RequestFactoryInterface
{
    use StreamFactoryTrait;
    use UriFactoryTrait;

    /**
     * {@inheritDoc}
     */
    public function createRequest(string $method, $uri): RequestInterface
    {
        if (is_string($uri)) {
            $uri = $this->createUri($uri);
        }

        if (! $uri instanceof UriInterface) {
            throw new InvalidArgumentException(sprintf(
                '$uri argument must be a string URI or %s instance; received %s',
                UriInterface::class,
                is_object($uri) ? get_class($uri) : gettype($uri)
            ));
        }

        return new Request(
            $uri,
            $method,
            $this->createStream()
        );
    }
}
