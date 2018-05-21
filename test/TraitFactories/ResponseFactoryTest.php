<?php

namespace MwopTest\TraitFactories;

use MwopTest\AbstractResponseFactoryTest;
use Mwop\Http\TraitFactories\ResponseFactory;
use Psr\Http\Message\ResponseFactoryInterface;

class ResponseFactoryTest extends AbstractResponseFactoryTest
{
    public function getFactory(): ResponseFactoryInterface
    {
        return new ResponseFactory();
    }
}
