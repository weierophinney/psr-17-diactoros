<?php

namespace MwopTest\DecoratedFactories;

use MwopTest\AbstractUriFactoryTest;
use Mwop\Http\DecoratedFactories\UriFactory;
use Psr\Http\Message\UriFactoryInterface;

class UriFactoryTest extends AbstractUriFactoryTest
{
    public function getFactory(): UriFactoryInterface
    {
        return new UriFactory();
    }
}
