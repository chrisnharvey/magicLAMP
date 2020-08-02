<?php

namespace App\Docker;

use App\Docker\Exception\DockerException;
use App\Docker\Exception\DockerFileNotFoundException;
use Illuminate\Support\Str;
use Symfony\Component\Process\Exception\ProcessFailedException;
use Symfony\Component\Process\Process;

class DockerExceptionParser
{
    protected ProcessFailedException $e;

    public function __construct(ProcessFailedException $e)
    {
        $this->e = $e;
    }

    public static function throw(ProcessFailedException $e)
    {
        throw (new static($e))->throwParsedException();
    }

    public function throwParsedException()
    {
        throw $this->parse();
    }

    protected function parse()
    {
        $errorOutput = $this->e->getProcess()->getErrorOutput();

        if (strpos($errorOutput, 'No such container:path:')) {
            return new DockerFileNotFoundException(
                trim(Str::afterLast($errorOutput, ':'))
            );
        }

        throw new DockerException($this->e);
    }
}