<?php

namespace MwopTest;

use PHPUnit\Framework\TestCase;
use Psr\Http\Message\ServerRequestFactoryInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Message\StreamInterface;
use Psr\Http\Message\UriInterface;
use Zend\Diactoros\Uri;

abstract class AbstractServerRequestFactoryTest extends TestCase
{
    abstract public function getFactory(): ServerRequestFactoryInterface;

    public function testCreateServerRequestReturnsPopulatedRequestFromStringUri()
    {
        $params = ['foo' => 'bar'];

        $factory = $this->getFactory();

        $request = $factory->createServerRequest('GET', 'https://example.com/path', $params);

        $this->assertInstanceOf(ServerRequestInterface::class, $request);
        $this->assertEquals('GET', $request->getMethod());

        $uri = $request->getUri();
        $this->assertInstanceOf(UriInterface::class, $uri);
        $this->assertEquals('https', $uri->getScheme());
        $this->assertEquals('example.com', $uri->getHost());
        $this->assertEquals('/path', $uri->getPath());

        $this->assertEquals($params, $request->getServerParams());

        $stream = $request->getBody();
        $this->assertInstanceOf(StreamInterface::class, $stream);
        $this->assertEquals(0, $stream->getSize());
    }

    public function testCreateServerRequestReturnsPopulatedRequestFromUriInstance()
    {
        $uri = new Uri('https://example.com/path');

        $params = ['foo' => 'bar'];

        $factory = $this->getFactory();

        $request = $factory->createServerRequest('GET', $uri, $params);

        $this->assertInstanceOf(ServerRequestInterface::class, $request);
        $this->assertEquals('GET', $request->getMethod());

        $this->assertSame($uri, $request->getUri());
        $this->assertEquals($params, $request->getServerParams());

        $stream = $request->getBody();
        $this->assertInstanceOf(StreamInterface::class, $stream);
        $this->assertEquals(0, $stream->getSize());
    }
}
