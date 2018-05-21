<?php

namespace MwopTest\TraitFactories;

use MwopTest\AbstractStreamFactoryTest;
use Mwop\Http\TraitFactories\StreamFactory;
use Psr\Http\Message\StreamFactoryInterface;

class StreamFactoryTest extends AbstractStreamFactoryTest
{
    public function getFactory(): StreamFactoryInterface
    {
        return new StreamFactory();
    }
}
