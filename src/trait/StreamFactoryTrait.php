<?php

namespace Mwop\Http\TraitFactories;

use Psr\Http\Message\StreamInterface;
use Zend\Diactoros\Stream;

trait StreamFactoryTrait
{
    /**
     * @link \Psr\Http\Message\StreamFactoryInterface::createStream
     */
    public function createStream(string $content = ''): StreamInterface
    {
        $resource = fopen('php://temp', 'wb+');
        fwrite($resource, $content);
        return $this->createStreamFromResource($resource);
    }

    /**
     * @link \Psr\Http\Message\StreamFactoryInterface::createStreamFromFile
     */
    public function createStreamFromFile(string $filename, string $mode = 'r'): StreamInterface
    {
        $resource = fopen($filename, $mode);
        return $this->createStreamFromResource($resource);
    }

    /**
     * @link \Psr\Http\Message\StreamFactoryInterface::createStreamFromResource
     */
    public function createStreamFromResource($resource): StreamInterface
    {
        return new Stream($resource);
    }
}
