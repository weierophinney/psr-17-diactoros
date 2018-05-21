<?php

namespace MwopTest\DecoratedFactories;

use MwopTest\AbstractRequestFactoryTest;
use Mwop\Http\DecoratedFactories\RequestFactory;
use Mwop\Http\DecoratedFactories\StreamFactory;
use Mwop\Http\DecoratedFactories\UriFactory;
use Psr\Http\Message\RequestFactoryInterface;

class RequestFactoryTest extends AbstractRequestFactoryTest
{
    public function getFactory(): RequestFactoryInterface
    {
        return new RequestFactory(new StreamFactory(), new UriFactory());
    }
}
