<?php

namespace MwopTest;

use Mwop\Http\Message\StreamFactory;
use Mwop\Http\Message\UploadedFileFactory;
use PHPUnit\Framework\TestCase;
use Psr\Http\Message\StreamInterface;
use Psr\Http\Message\UploadedFileFactoryInterface;
use Psr\Http\Message\UploadedFileInterface;

class UploadedFileFactoryTest extends TestCase
{
    public function getFactory(): UploadedFileFactoryInterface
    {
        return new UploadedFileFactory(new StreamFactory());
    }

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
