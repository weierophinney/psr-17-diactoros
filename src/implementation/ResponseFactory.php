<?php

namespace Mwop\Http\Message;

use Psr\Http\Message\ResponseFactoryInterface;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\StreamFactoryInterface;
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
}
