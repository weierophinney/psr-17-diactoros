<?php

namespace MwopTest\DuplicatedFactories;

use MwopTest\AbstractRequestFactoryTest;
use Mwop\Http\DuplicatedFactories\RequestFactory;
use Psr\Http\Message\RequestFactoryInterface;

class RequestFactoryTest extends AbstractRequestFactoryTest
{
    public function getFactory(): RequestFactoryInterface
    {
        return new RequestFactory();
    }
}
