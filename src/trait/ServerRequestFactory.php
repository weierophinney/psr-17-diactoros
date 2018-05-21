<?php

namespace Mwop\Http\TraitFactories;

use InvalidArgumentException;
use Psr\Http\Message\ServerRequestFactoryInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Message\UriInterface;
use Zend\Diactoros\ServerRequest;

class ServerRequestFactory implements ServerRequestFactoryInterface
{
    use StreamFactoryTrait;
    use UploadedFileFactoryTrait;
    use UriFactoryTrait;

    /**
     * {@inheritDoc}
     */
    public function createServerRequest(string $method, $uri, array $serverParams = []): ServerRequestInterface
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

        return new ServerRequest(
            $serverParams,
            [],
            $uri,
            $method,
            $this->createStream()
        );
    }
}
