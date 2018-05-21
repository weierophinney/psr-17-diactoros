<?php

namespace MwopTest\DecoratedFactories;

use MwopTest\AbstractStreamFactoryTest;
use Mwop\Http\DecoratedFactories\StreamFactory;
use Psr\Http\Message\StreamFactoryInterface;

class StreamFactoryTest extends AbstractStreamFactoryTest
{
    public function getFactory(): StreamFactoryInterface
    {
        return new StreamFactory();
    }
}
