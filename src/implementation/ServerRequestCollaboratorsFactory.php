<?php

namespace Mwop\Http\Message;

use Psr\Http\Message\ServerRequestCollaboratorsFactoryInterface;
use Psr\Http\Message\ServerRequestFactoryInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Message\StreamFactoryInterface;
use Psr\Http\Message\UriFactoryInterface;
use Psr\Http\Message\UriInterface;
use Zend\Diactoros\ServerRequest;

class ServerRequestFactory implements ServerRequestCollaboratorsFactoryInterface
{
    /**
     * @var ServerRequestFactoryInterface
     */
    private $serverRequestFactory;

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
        ServerRequestFactoryInterface $serverRequestFactory = null,
        StreamFactoryInterface $streamFactory = null,
        UriFactoryInterface $uriFactory = null,
        UploadedFileFactoryInterface $uploadedFileFactory = null
    ) {
        $this->streamFactory = $streamFactory ?: new StreamFactory();
        $this->uriFactory = $uriFactory ?: new UriFactory();
        $this->uploadedFileFactory = $uploadedFileFactory ?: new UploadedFileFactory($this->streamFactory);
        $this->serverRequestFactory = $serverRequestFactory ?: new ServerRequestFactory(
            $this->streamFactory,
            $this->uriFactory
        );
    }

    /**
     * {@inheritDoc}
     */
    public function createServerRequest(string $method, $uri, array $serverParams = []): ServerRequestInterface
    {
        return $this->serverRequestFactory->createServerRequest($method, $uri, $serverParams);
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
