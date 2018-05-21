<?php

namespace MwopTest\DuplicatedFactories;

use MwopTest\AbstractUploadedFileFactoryTest;
use Mwop\Http\DuplicatedFactories\UploadedFileFactory;
use Psr\Http\Message\UploadedFileFactoryInterface;

class UploadedFileFactoryTest extends AbstractUploadedFileFactoryTest
{
    public function getFactory(): UploadedFileFactoryInterface
    {
        return new UploadedFileFactory();
    }
}
