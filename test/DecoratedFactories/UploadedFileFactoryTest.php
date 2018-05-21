<?php

namespace MwopTest\DecoratedFactories;

use MwopTest\AbstractUploadedFileFactoryTest;
use Mwop\Http\DecoratedFactories\StreamFactory;
use Mwop\Http\DecoratedFactories\UploadedFileFactory;
use Psr\Http\Message\UploadedFileFactoryInterface;

class UploadedFileFactoryTest extends AbstractUploadedFileFactoryTest
{
    public function getFactory(): UploadedFileFactoryInterface
    {
        return new UploadedFileFactory(new StreamFactory());
    }
}
