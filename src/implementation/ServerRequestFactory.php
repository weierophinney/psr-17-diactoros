<?php

namespace Mwop\Http\Message;

use Psr\Http\Message\ServerRequestFactoryInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Message\StreamFactoryInterface;
use Psr\Http\Message\UriFactoryInterface;
use Psr\Http\Message\UriInterface;
use Zend\Diactoros\ServerRequest;

class ServerRequestFactory implements ServerRequestFactoryInterface
{
    /**
     * @var StreamFactoryInterface
     */
    private $streamFactory;

    /**
     * @var UriFactoryInterface
     */
    private $uriFactory;

    public function __construct(
        StreamFactoryInterface $streamFactory = null,
        UriFactoryInterface $uriFactory = null
    ) {
        $this->streamFactory = $streamFactory ?: new StreamFactory();
        $this->uriFactory = $uriFactory ?: new UriFactory();
    }

    /**
     * {@inheritDoc}
     */
    public function createServerRequest(string $method, $uri, array $serverParams = []): ServerRequestInterface
    {
        if (is_string($uri)) {
            $uri = $this->uriFactory->createUri($uri);
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
            $this->streamFactory->createStream()
        );
    }
}
