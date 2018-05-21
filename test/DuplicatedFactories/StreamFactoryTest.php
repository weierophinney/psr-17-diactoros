<?php

namespace MwopTest\DuplicatedFactories;

use MwopTest\AbstractStreamFactoryTest;
use Mwop\Http\DuplicatedFactories\StreamFactory;
use Psr\Http\Message\StreamFactoryInterface;

class StreamFactoryTest extends AbstractStreamFactoryTest
{
    public function getFactory(): StreamFactoryInterface
    {
        return new StreamFactory();
    }
}
