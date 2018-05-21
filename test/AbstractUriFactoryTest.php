<?php

namespace MwopTest;

use PHPUnit\Framework\TestCase;
use Psr\Http\Message\UriFactoryInterface;
use Psr\Http\Message\UriInterface;

abstract class AbstractUriFactoryTest extends TestCase
{
    abstract public function getFactory(): UriFactoryInterface;

    public function testCreateUriReturnsPopulatedInstance()
    {
        $factory = $this->getFactory();

        $uri = $factory->createUri('https://example.com/path');

        $this->assertInstanceOf(UriInterface::class, $uri);

        $this->assertEquals('https://example.com/path', (string) $uri);
    }
}
