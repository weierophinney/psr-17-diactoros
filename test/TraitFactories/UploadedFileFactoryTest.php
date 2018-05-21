<?php

namespace MwopTest\TraitFactories;

use MwopTest\AbstractUploadedFileFactoryTest;
use Mwop\Http\TraitFactories\UploadedFileFactory;
use Psr\Http\Message\UploadedFileFactoryInterface;

class UploadedFileFactoryTest extends AbstractUploadedFileFactoryTest
{
    public function getFactory(): UploadedFileFactoryInterface
    {
        return new UploadedFileFactory();
    }
}
