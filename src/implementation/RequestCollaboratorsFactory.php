<?php

namespace Mwop\Http\Message;

use Psr\Http\Message\RequestCollaboratorsFactoryInterface;
use Psr\Http\Message\RequestFactoryInterface;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\StreamFactoryInterface;
use Psr\Http\Message\StreamInterface;
use Psr\Http\Message\UriFactoryInterface;
use Psr\Http\Message\UriInterface;
use Zend\Diactoros\Request;

class RequestFactory implements RequestCollaboratorsFactoryInterface
{
    /**
     * @var RequestFactoryInterface
     */
    private $requestFactory;

    /**
     * @var StreamFactoryInterface
     */
    private $streamFactory;

    /**
     * @var UriFactoryInterface
     */
    private $uriFactory;

    public function __construct(
        RequestFactoryInterface $requestFactory = null,
        StreamFactoryInterface $streamFactory = null,
        UriFactoryInterface $uriFactory = null
    ) {
        $this->requestFactory = $requestFactory ?: new RequestFactory();
        $this->streamFactory = $streamFactory ?: new StreamFactory();
        $this->uriFactory = $uriFactory ?: new uriFactory();
    }

    /**
     * {@inheritDoc}
     */
    public function createRequest(string $method, $uri): RequestInterface
    {
        return $this->requestFactory->createRequset($method, $uri);
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
}
