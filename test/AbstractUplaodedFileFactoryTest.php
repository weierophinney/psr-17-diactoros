<?php

namespace MwopTest;

use PHPUnit\Framework\TestCase;
use Psr\Http\Message\StreamInterface;
use Psr\Http\Message\UploadedFileFactoryInterface;
use Psr\Http\Message\UploadedFileInterface;

abstract class AbstractUploadedFileFactoryTest extends TestCase
{
    abstract public function getFactory(): UploadedFileFactoryInterface;

    public function testCreateUploadedFileReturnsPopulatedInstance()
    {
        $stream = $this->prophesize(StreamInterface::class)->reveal();
        $factory = $this->getFactory();

        $upload = $factory->createUploadedFile($stream, 200, \UPLOAD_ERR_OK, 'somefile.txt', 'text/plain');

        $this->assertInstanceOf(UploadedFileInterface::class, $upload);

        $this->assertSame($stream, $upload->getStream());
        $this->assertSame(200, $upload->getSize());
        $this->assertSame(\UPLOAD_ERR_OK, $upload->getError());
        $this->assertSame('somefile.txt', $upload->getClientFilename());
        $this->assertSame('text/plain', $upload->getClientMediaType());
    }
}
