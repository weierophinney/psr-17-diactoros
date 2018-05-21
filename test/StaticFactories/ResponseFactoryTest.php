<?php

namespace MwopTest\StaticFactories;

use MwopTest\AbstractResponseFactoryTest;
use Mwop\Http\StaticFactories\ResponseFactory;
use Psr\Http\Message\ResponseFactoryInterface;

class ResponseFactoryTest extends AbstractResponseFactoryTest
{
    public function getFactory(): ResponseFactoryInterface
    {
        return new ResponseFactory();
    }
}
