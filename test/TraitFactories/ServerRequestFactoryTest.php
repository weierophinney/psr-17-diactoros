<?php

namespace MwopTest\TraitFactories;

use MwopTest\AbstractServerRequestFactoryTest;
use Mwop\Http\TraitFactories\ServerRequestFactory;
use Psr\Http\Message\ServerRequestFactoryInterface;

class ServerRequestFactoryTest extends AbstractServerRequestFactoryTest
{
    public function getFactory(): ServerRequestFactoryInterface
    {
        return new ServerRequestFactory();
    }
}
