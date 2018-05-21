<?php

namespace MwopTest;

use Mwop\Http\Message\ResponseFactory;
use Mwop\Http\Message\StreamFactory;
use PHPUnit\Framework\TestCase;
use Psr\Http\Message\ResponseFactoryInterface;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\StreamInterface;

class ResponseFactoryTest extends TestCase
{
    public function getFactory(): ResponseFactoryInterface
    {
        return new ResponseFactory(new StreamFactory());
    }

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
