<?php

namespace Mwop\Http\Message;

use Psr\Http\Message\ServerRequestCollaboratorsFactoryInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Message\StreamFactoryInterface;
use Psr\Http\Message\StreamInterface;
use Psr\Http\Message\UploadedFileInterface;
use Psr\Http\Message\UriFactoryInterface;
use Psr\Http\Message\UriInterface;
use Zend\Diactoros\ServerRequest;

class ServerRequestFactory implements ServerRequestCollaboratorsFactoryInterface
{
    /**
     * @var StreamFactoryInterface
     */
    private $streamFactory;

    /**
     * @var UploadedFileFactoryInterface
     */
    private $uploadedFileFactory;

    /**
     * @var UriFactoryInterface
     */
    private $uriFactory;

    public function __construct(
        StreamFactoryInterface $streamFactory = null,
        UriFactoryInterface $uriFactory = null,
        UploadedFileFactoryInterface $uploadedFileFactory = null
    ) {
        $this->streamFactory = $streamFactory ?: new StreamFactory();
        $this->uriFactory = $uriFactory ?: new uriFactory();
        $this->uploadedFileFactory = $uploadedFileFactory ?: new UploadedFileFactory($this->streamFactory);
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

    /**
     * {@inheritDoc}
     */
    public function createStream(string $content = ''): StreamInterface
    {
        return $this->streamFactory->createStream($content);
    }

    /**
     * {@inheritDoc}
     */
    public function createStreamFromFile(string $filename, string $mode = 'r'): StreamInterface
    {
        return $this->streamFactory->createStreamFromFile($filename, $mode);
    }

    /**
     * {@inheritDoc}
     */
    public function createStreamFromResource($resource): StreamInterface
    {
        return $this->streamFactory->createStreamFromResource($resource);
    }

    /**
     * {@inheritDoc}
     */
    public function createUri(string $uri = ''): UriInterface
    {
        return $this->uriFactory->createUri($uri);
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
        return new $this->uploadedFileFactory->createUploadedFile(
            $stream,
            $size,
            $error,
            $clientFilename,
            $clientMediaType
        );
    }
}
