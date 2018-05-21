<?php

namespace MwopTest;

use PHPUnit\Framework\TestCase;
use Psr\Http\Message\RequestFactoryInterface;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\StreamInterface;
use Psr\Http\Message\UriInterface;
use Zend\Diactoros\Uri;

abstract class AbstractRequestFactoryTest extends TestCase
{
    abstract public function getFactory(): RequestFactoryInterface;

    public function testCreateRequestReturnsPopulatedRequestFromStringUri()
    {
        $factory = $this->getFactory();

        $request = $factory->createRequest('GET', 'https://example.com/path');

        $this->assertInstanceOf(RequestInterface::class, $request);
        $this->assertEquals('GET', $request->getMethod());

        $uri = $request->getUri();
        $this->assertInstanceOf(UriInterface::class, $uri);
        $this->assertEquals('https', $uri->getScheme());
        $this->assertEquals('example.com', $uri->getHost());
        $this->assertEquals('/path', $uri->getPath());

        $stream = $request->getBody();
        $this->assertInstanceOf(StreamInterface::class, $stream);
        $this->assertEquals(0, $stream->getSize());
    }

    public function testCreateRequestReturnsPopulatedRequestFromUriInstance()
    {
        $uri = new Uri('https://example.com/path');

        $factory = $this->getFactory();

        $request = $factory->createRequest('GET', $uri);

        $this->assertInstanceOf(RequestInterface::class, $request);
        $this->assertEquals('GET', $request->getMethod());

        $this->assertSame($uri, $request->getUri());

        $stream = $request->getBody();
        $this->assertInstanceOf(StreamInterface::class, $stream);
        $this->assertEquals(0, $stream->getSize());
    }
}
