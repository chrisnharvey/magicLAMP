<?php

namespace App\Docker\Exception;

use RuntimeException;

class DockerFileNotFoundException extends RuntimeException
{
    public function __construct(string $containerFile)
    {
        $this->containerFile = $containerFile;

        parent::__construct("{$containerFile} was not found in this container");
    }

    public function getContainerFile(): string
    {
        return $this->containerFile;
    }
}