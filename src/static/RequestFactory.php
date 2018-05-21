<?php

namespace Mwop\Http\StaticFactories;

use InvalidArgumentException;
use Psr\Http\Message\RequestFactoryInterface;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\StreamInterface;
use Psr\Http\Message\UriInterface;
use Zend\Diactoros\Request;

class RequestFactory implements RequestFactoryInterface
{
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

    /**
     * {@inheritDoc}
     */
    public function createStream(string $content = ''): StreamInterface
    {
        return AbstractStreamFactory::createStream($content);
    }

    /**
     * {@inheritDoc}
     */
    public function createStreamFromFile(string $filename, string $mode = 'r'): StreamInterface
    {
        return AbstractStreamFactory::createStreamFromFile($filename, $mode);
    }

    /**
     * {@inheritDoc}
     */
    public function createStreamFromResource($resource): StreamInterface
    {
        return AbstractStreamFactory::createStreamFromResource($resource);
    }
        
    /**
     * {@inheritDoc}
     */
    public function createUri(string $uri = ''): UriInterface
    {
        return AbstractUriFactory::createUri($uri);
    }
}
