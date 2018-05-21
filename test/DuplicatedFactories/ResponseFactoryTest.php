<?php

namespace MwopTest\DuplicatedFactories;

use MwopTest\AbstractResponseFactoryTest;
use Mwop\Http\DuplicatedFactories\ResponseFactory;
use Psr\Http\Message\ResponseFactoryInterface;

class ResponseFactoryTest extends AbstractResponseFactoryTest
{
    public function getFactory(): ResponseFactoryInterface
    {
        return new ResponseFactory();
    }
}
