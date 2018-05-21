<?php

namespace MwopTest;

use Mwop\Http\Message\UriFactory;
use PHPUnit\Framework\TestCase;
use Psr\Http\Message\UriFactoryInterface;
use Psr\Http\Message\UriInterface;

class UriFactoryTest extends TestCase
{
    public function getFactory(): UriFactoryInterface
    {
        return new UriFactory();
    }

    public function testCreateUriReturnsPopulatedInstance()
    {
        $factory = $this->getFactory();

        $uri = $factory->createUri('https://example.com/path');

        $this->assertInstanceOf(UriInterface::class, $uri);

        $this->assertEquals('https://example.com/path', (string) $uri);
    }
}
