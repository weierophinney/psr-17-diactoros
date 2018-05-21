<?php

namespace MwopTest;

use Mwop\Http\Message\ServerRequestFactory;
use Mwop\Http\Message\StreamFactory;
use Mwop\Http\Message\UriFactory;
use PHPUnit\Framework\TestCase;
use Psr\Http\Message\ServerRequestFactoryInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Message\StreamInterface;
use Psr\Http\Message\UriInterface;
use Zend\Diactoros\Uri;

class ServerRequestFactoryTest extends TestCase
{
    public function getFactory(): ServerRequestFactoryInterface
    {
        return new ServerRequestFactory(new StreamFactory(), new UriFactory());
    }

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
