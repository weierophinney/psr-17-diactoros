<?php

namespace Psr\Http\Message;

/**
 * Provide a single factory with methods exposed to allow creation of a
 * request and all collaborators.
 */
interface RequestCollaboratorsFactoryInterface extends
    RequestFactoryInterface,
    StreamFactoryInterface,
    UriFactoryInterface
{
}
