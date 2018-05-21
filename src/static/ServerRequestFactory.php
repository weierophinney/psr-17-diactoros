<?php

namespace Mwop\Http\StaticFactories;

use InvalidArgumentException;
use Psr\Http\Message\ServerRequestFactoryInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Message\StreamInterface;
use Psr\Http\Message\UploadedFileInterface;
use Psr\Http\Message\UriInterface;
use Zend\Diactoros\ServerRequest;

class ServerRequestFactory implements ServerRequestFactoryInterface
{
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

    /**
     * {@inheritDoc}
     */
    public function createUploadedFile(
        StreamInterface $stream,
        int $size = null,
        int $error = \UPLOAD_ERR_OK,
        string $clientFilename = null,
        string $clientMediaType = null
    ): UploadedFileInterface {
        return AbstractUploadedFileFactory::createUploadedFile(
            $stream,
            $size,
            $error,
            $clientFilename,
            $clientMediaType
        );
    }
}
