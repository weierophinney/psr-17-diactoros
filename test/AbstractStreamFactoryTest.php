<?php

namespace MwopTest;

use PHPUnit\Framework\TestCase;
use Psr\Http\Message\StreamFactoryInterface;
use Psr\Http\Message\StreamInterface;

abstract class AbstractStreamFactoryTest extends TestCase
{
    private $tempFile;

    abstract public function getFactory(): StreamFactoryInterface;

    public function tearDown()
    {
        if ($this->tempFile) {
            unlink($this->tempFile);
        }
    }

    public function testCreateStreamGeneratesAWritableStreamWithContentsProvided()
    {
        $factory = $this->getFactory();

        $stream = $factory->createStream('CONTENT');

        $this->assertInstanceOf(StreamInterface::class, $stream);
        $this->assertEquals('CONTENT', (string) $stream);

        $this->assertTrue($stream->isWritable());
        $this->assertTrue($stream->isSeekable());

        $stream->seek($stream->getSize());
        $stream->write(' AND MORE');
        $this->assertEquals('CONTENT AND MORE', (string) $stream);
    }

    public function testCreateStreamFromFileGeneratesAStreamBasedOnFile()
    {
        $factory = $this->getFactory();

        $this->tempFile = tempnam(sys_get_temp_dir(), 'psr17');
        $contents = file_get_contents(__FILE__);
        file_put_contents($this->tempFile, $contents);

        $stream = $factory->createStreamFromFile($this->tempFile, 'r');

        $this->assertInstanceOf(StreamInterface::class, $stream);
        $this->assertEquals($contents, (string) $stream);
        $this->assertFalse($stream->isWritable());
    }

    public function testCreateStreamFromResourceGeneratesAStreamBasedOnResource()
    {
        $factory = $this->getFactory();

        $this->tempFile = tempnam(sys_get_temp_dir(), 'psr17');
        $contents = file_get_contents(__FILE__);
        file_put_contents($this->tempFile, $contents);

        $resource = fopen($this->tempFile, 'r');

        $stream = $factory->createStreamFromResource($resource);

        $this->assertInstanceOf(StreamInterface::class, $stream);
        $this->assertEquals($contents, (string) $stream);
        $this->assertFalse($stream->isWritable());
    }
}
