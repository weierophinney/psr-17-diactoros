<?php

namespace MwopTest\DecoratedFactories;

use MwopTest\AbstractServerRequestFactoryTest;
use Mwop\Http\DecoratedFactories\ServerRequestFactory;
use Mwop\Http\DecoratedFactories\StreamFactory;
use Mwop\Http\DecoratedFactories\UploadedFileFactory;
use Mwop\Http\DecoratedFactories\UriFactory;
use Psr\Http\Message\ServerRequestFactoryInterface;

class ServerRequestFactoryTest extends AbstractServerRequestFactoryTest
{
    public function getFactory(): ServerRequestFactoryInterface
    {
        return new ServerRequestFactory(
            new StreamFactory(),
            new UriFactory(),
            new UploadedFileFactory()
        );
    }
}
