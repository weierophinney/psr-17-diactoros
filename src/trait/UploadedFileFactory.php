<?php

namespace Mwop\Http\TraitFactories;

use Psr\Http\Message\UploadedFileFactoryInterface;

class UploadedFileFactory implements UploadedFileFactoryInterface
{
    use StreamFactoryTrait;
    use UploadedFileFactoryTrait;
}
