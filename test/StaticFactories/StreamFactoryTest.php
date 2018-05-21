<?php

namespace MwopTest\StaticFactories;

use MwopTest\AbstractStreamFactoryTest;
use Mwop\Http\StaticFactories\StreamFactory;
use Psr\Http\Message\StreamFactoryInterface;

class StreamFactoryTest extends AbstractStreamFactoryTest
{
    public function getFactory(): StreamFactoryInterface
    {
        return new StreamFactory();
    }
}
