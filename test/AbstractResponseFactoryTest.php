<?php

namespace MwopTest;

use PHPUnit\Framework\TestCase;
use Psr\Http\Message\ResponseFactoryInterface;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\StreamInterface;

abstract class AbstractResponseFactoryTest extends TestCase
{
    abstract public function getFactory(): ResponseFactoryInterface;

    public function testCreateResponseReturnsResponseWithStatusAndReason()
    {
        $factory = $this->getFactory();

        $response = $factory->createResponse(201, 'Accepted');

        $this->assertInstanceOf(ResponseInterface::class, $response);
        $this->assertEquals(201, $response->getStatusCode());
        $this->assertEquals('Accepted', $response->getReasonPhrase());

        $body = $response->getBody();
        $this->assertInstanceOf(StreamInterface::class, $body);
        $this->assertEquals(0, $body->getSize());
    }
}
