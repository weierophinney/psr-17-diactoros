<?php

namespace MwopTest\DuplicatedFactories;

use MwopTest\AbstractServerRequestFactoryTest;
use Mwop\Http\DuplicatedFactories\ServerRequestFactory;
use Psr\Http\Message\ServerRequestFactoryInterface;

class ServerRequestFactoryTest extends AbstractServerRequestFactoryTest
{
    public function getFactory(): ServerRequestFactoryInterface
    {
        return new ServerRequestFactory();
    }
}
