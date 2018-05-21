<?php

namespace MwopTest\DecoratedFactories;

use MwopTest\AbstractResponseFactoryTest;
use Mwop\Http\DecoratedFactories\ResponseFactory;
use Mwop\Http\DecoratedFactories\StreamFactory;
use Psr\Http\Message\ResponseFactoryInterface;

class ResponseFactoryTest extends AbstractResponseFactoryTest
{
    public function getFactory(): ResponseFactoryInterface
    {
        return new ResponseFactory(new StreamFactory());
    }
}
