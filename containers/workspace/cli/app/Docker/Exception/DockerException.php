<?php

namespace App\Docker\Exception;

use RuntimeException;
use Symfony\Component\Process\Exception\ProcessFailedException;

class DockerException extends RuntimeException
{
    public function __construct(ProcessFailedException $e)
    {
        parent::__construct($e->getProcess()->getErrorOutput());
    }
}