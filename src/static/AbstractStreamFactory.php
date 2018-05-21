<?php

namespace Mwop\Http\StaticFactories;

use Psr\Http\Message\StreamInterface;
use Zend\Diactoros\Stream;

abstract class AbstractStreamFactory
{
    /**
     * Do not allow instantiation
     */
    private function __construct()
    {
    }

    /**
     * @link \Psr\Http\Message\StreamFactoryInterface::createStream
     */
    public static function createStream(string $content = ''): StreamInterface
    {
        $resource = fopen('php://temp', 'wb+');
        fwrite($resource, $content);
        return self::createStreamFromResource($resource);
    }

    /**
     * @link \Psr\Http\Message\StreamFactoryInterface::createStreamFromFile
     */
    public static function createStreamFromFile(string $filename, string $mode = 'r'): StreamInterface
    {
        $resource = fopen($filename, $mode);
        return self::createStreamFromResource($resource);
    }

    /**
     * @link \Psr\Http\Message\StreamFactoryInterface::createStreamFromResource
     */
    public static function createStreamFromResource($resource): StreamInterface
    {
        return new Stream($resource);
    }
}
