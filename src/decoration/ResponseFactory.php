<?php

namespace Mwop\Http\DecoratedFactories;

use Psr\Http\Message\ResponseFactoryInterface;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\StreamFactoryInterface;
use Psr\Http\Message\StreamInterface;
use Zend\Diactoros\Response;

class ResponseFactory implements ResponseFactoryInterface
{
    /**
     * @var StreamFactoryInterface
     */
    private $streamFactory;

    public function __construct(StreamFactoryInterface $streamFactory = null)
    {
        $this->streamFactory = $streamFactory ?: new StreamFactory();
    }

    /**
     * {@inheritDoc}
     */
    public function createResponse(int $code = 200, string $reasonPhrase = ''): ResponseInterface
    {
        $body = $this->streamFactory->createStream();
        return (new Response($body))->withStatus($code, $reasonPhrase);
    }

    /**
     * {@inheritDoc}
     */
    public function createStream(string $content = ''): StreamInterface
    {
        return $this->streamFactory->createStream($string);
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
}
