<?php

namespace Mwop\Http\StaticFactories;

use Psr\Http\Message\StreamInterface;
use Psr\Http\Message\UploadedFileInterface;
use Zend\Diactoros\UploadedFile;

abstract class AbstractUploadedFileFactory
{
    /**
     * Do not allow instantiation
     */
    private function __construct()
    {
    }
        
    /**
     * @link \Psr\Http\Message\UploadedFileFactoryInterface::createUploadedFile
     */
    public static function createUploadedFile(
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
