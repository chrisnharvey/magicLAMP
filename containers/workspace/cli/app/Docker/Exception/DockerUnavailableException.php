<?php

namespace App\Docker\Exception;

use RuntimeException;

class DockerUnavailableException extends RuntimeException
{
    public static function create(Docker $docker)
    {
        return new static($docker->getDockerError());
    }
}