<?php

namespace MwopTest\StaticFactories;

use MwopTest\AbstractServerRequestFactoryTest;
use Mwop\Http\StaticFactories\ServerRequestFactory;
use Psr\Http\Message\ServerRequestFactoryInterface;

class ServerRequestFactoryTest extends AbstractServerRequestFactoryTest
{
    public function getFactory(): ServerRequestFactoryInterface
    {
        return new ServerRequestFactory();
    }
}
