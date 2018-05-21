<?php

namespace MwopTest\StaticFactories;

use MwopTest\AbstractRequestFactoryTest;
use Mwop\Http\StaticFactories\RequestFactory;
use Psr\Http\Message\RequestFactoryInterface;

class RequestFactoryTest extends AbstractRequestFactoryTest
{
    public function getFactory(): RequestFactoryInterface
    {
        return new RequestFactory();
    }
}
