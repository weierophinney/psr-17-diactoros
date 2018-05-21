<?php

namespace MwopTest\StaticFactories;

use MwopTest\AbstractUriFactoryTest;
use Mwop\Http\StaticFactories\UriFactory;
use Psr\Http\Message\UriFactoryInterface;

class UriFactoryTest extends AbstractUriFactoryTest
{
    public function getFactory(): UriFactoryInterface
    {
        return new UriFactory();
    }
}
