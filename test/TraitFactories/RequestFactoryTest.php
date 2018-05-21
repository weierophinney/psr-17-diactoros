<?php

namespace MwopTest\TraitFactories;

use MwopTest\AbstractRequestFactoryTest;
use Mwop\Http\TraitFactories\RequestFactory;
use Psr\Http\Message\RequestFactoryInterface;

class RequestFactoryTest extends AbstractRequestFactoryTest
{
    public function getFactory(): RequestFactoryInterface
    {
        return new RequestFactory();
    }
}
