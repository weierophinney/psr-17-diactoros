<?php

namespace Mwop\Http\DecoratedFactories;

use Psr\Http\Message\StreamFactoryInterface;
use Psr\Http\Message\StreamInterface;
use Psr\Http\Message\UploadedFileFactoryInterface;
use Psr\Http\Message\UploadedFileInterface;
use Zend\Diactoros\UploadedFile;

class UploadedFileFactory implements UploadedFileFactoryInterface
{
    /**
     * @var StreamFactoryInterface
     */
    private $streamFactory;

    public function __construct(StreamFactoryInterface $streamFactory = null)
    {
        $this->streamFactory = $streamFactory ?: new StreamFactory();
    }

    /**
     * {@inheritDoc}
     */
    public function createUploadedFile(
        StreamInterface $stream,
        int $size = null,
        int $error = \UPLOAD_ERR_OK,
        string $clientFilename = null,
        string $clientMediaType = null
    ): UploadedFileInterface {
        return new UploadedFile(
            $stream,
            $size,
            $error,
            $clientFilename,
            $clientMediaType
        );
    }

    /**
     * {@inheritDoc}
     */
    public function createStream(string $content = ''): StreamInterface
    {
        return $this->streamFactory->createStream($string);
    }

    /**
     * {@inheritDoc}
     */
    public function createStreamFromFile(string $filename, string $mode = 'r'): StreamInterface
    {
        return $this->streamFactory->createStreamFromFile($filename, $mode);
    }

    /**
     * {@inheritDoc}
     */
    public function createStreamFromResource($resource): StreamInterface
    {
        return $this->streamFactory->createStreamFromResource($resource);
    }
}
