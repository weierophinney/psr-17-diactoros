<?php

namespace Mwop\Http\Message;

use Psr\Http\Message\StreamFactoryInterface;
use Psr\Http\Message\StreamInterface;
use Psr\Http\Message\UploadedFileCollaboratorsFactoryInterface;
use Psr\Http\Message\UploadedFileFactoryInterface;
use Psr\Http\Message\UploadedFileInterface;
use Zend\Diactoros\UploadedFile;

class UploadedFileCollaboratorsFactory implements UploadedFileCollaboratorsFactoryInterface
{
    /**
     * @var StreamFactoryInterface
     */
    private $streamFactory;

    /**
     * @var UploadedFileFactoryInterface
     */
    private $uploadedFileFactory;

    public function __construct(
        UploadedFileFactoryInterface $uploadedFileFactory,
        StreamFactoryInterface $streamFactory = null
    ) {
        $this->uploadedFileFactory = $uploadedFileFactory ?: new UploadedFileFactory();
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
        return $this->uploadedFileFactory->createUploadedFile(
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
        return $this->streamFactory->createStream($content);
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
