<?php

namespace Psr\Http\Message;

/**
 * Provide a single factory with methods exposed to allow creation of a
 * server request and all collaborators.
 */
interface ServerRequestCollaboratorsFactoryInterface extends
    ServerRequestFactoryInterface,
    StreamFactoryInterface,
    UploadedFileFactoryInterface,
    UriFactoryInterface
{
}
