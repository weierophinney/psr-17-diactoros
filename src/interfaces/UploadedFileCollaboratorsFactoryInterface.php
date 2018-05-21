<?php

namespace Psr\Http\Message;

/**
 * Provide a single factory with methods exposed to allow creation of an
 * uploaded file and all collaborators.
 */
interface UploadedFileCollaboratorsFactoryInterface extends
    UploadedFileFactoryInterface,
    StreamFactoryInterface
{
}
