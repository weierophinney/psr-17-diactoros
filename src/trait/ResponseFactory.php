<?php

namespace Mwop\Http\TraitFactories;

use Psr\Http\Message\ResponseFactoryInterface;
use Psr\Http\Message\ResponseInterface;
use Zend\Diactoros\Response;

class ResponseFactory implements ResponseFactoryInterface
{
    use StreamFactoryTrait;

    /**
     * {@inheritDoc}
     */
    public function createResponse(int $code = 200, string $reasonPhrase = ''): ResponseInterface
    {
        $body = $this->createStream();
        return (new Response($body))->withStatus($code, $reasonPhrase);
    }
}
