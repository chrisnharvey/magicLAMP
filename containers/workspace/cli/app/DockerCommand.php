<?php

namespace App;

use App\Docker\Docker;
use LaravelZero\Framework\Commands\Command;

abstract class DockerCommand extends Command
{
    protected Docker $docker;

    protected bool $requiresDocker = false;

    public function __construct(Docker $docker, Host $host)
    {
        parent::__construct();

        $this->docker = $docker;
        $this->host = $host;

        if ($this->requiresDocker) {
            $this->setHidden(! $docker->isAvailable());
        }
    }

    protected function ensureDockerIsRunning()
    {
        if (! $this->docker->isAvailable()) {
            $this->error(
                $this->docker->getError()
            );

            exit(1);
        }
    }
}