<?php

namespace MwopTest\StaticFactories;

use MwopTest\AbstractUploadedFileFactoryTest;
use Mwop\Http\StaticFactories\UploadedFileFactory;
use Psr\Http\Message\UploadedFileFactoryInterface;

class UploadedFileFactoryTest extends AbstractUploadedFileFactoryTest
{
    public function getFactory(): UploadedFileFactoryInterface
    {
        return new UploadedFileFactory();
    }
}
