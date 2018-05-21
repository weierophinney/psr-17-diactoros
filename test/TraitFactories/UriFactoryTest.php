<?php

namespace MwopTest\TraitFactories;

use MwopTest\AbstractUriFactoryTest;
use Mwop\Http\TraitFactories\UriFactory;
use Psr\Http\Message\UriFactoryInterface;

class UriFactoryTest extends AbstractUriFactoryTest
{
    public function getFactory(): UriFactoryInterface
    {
        return new UriFactory();
    }
}
