<?php

namespace Psr\Http\Message;

/**
 * Provide a single factory with methods exposed to allow creation of a
 * response and all collaborators.
 */
interface ResponseCollaboratorsFactoryInterface extends
    ResponseFactoryInterface,
    StreamFactoryInterface
{
}
