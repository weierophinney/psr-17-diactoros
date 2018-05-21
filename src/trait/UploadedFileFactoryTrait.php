<?php

namespace Mwop\Http\TraitFactories;

use Psr\Http\Message\StreamInterface;
use Psr\Http\Message\UploadedFileInterface;
use Zend\Diactoros\UploadedFile;

trait UploadedFileFactoryTrait
{
    /**
     * @link \Psr\Http\Message\UploadedFileFactoryInterface::createUploadedFile
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
}
