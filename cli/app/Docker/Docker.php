<?php

namespace App\Docker;

use Symfony\Component\Process\Exception\ProcessFailedException;
use Symfony\Component\Process\Process;

class Docker
{
    protected bool $isAvailable;
    protected string $dockerPath;
    protected string $dockerComposePath;
    protected ?string $magicLampPath;
    protected string $error;

    public function __construct(string $dockerPath, string $dockerComposePath, ?string $magicLampPath = null)
    {
        $this->dockerPath = $dockerPath;
        $this->dockerComposePath = $dockerComposePath;
        $this->magicLampPath = $magicLampPath;
    }

    public function isAvailable(): bool
    {
        if (isset($this->isAvailable)) {
            return $this->isAvailable;
        }

        try {
            (new Process([$this->dockerComposePath, 'ps'], $this->magicLampPath))->mustRun();
        } catch (ProcessFailedException $e) {
            $this->error = $e->getProcess()->getErrorOutput();
            return $this->isAvailable = false;
        }

        return $this->isAvailable = true;
    }

    public function getMagiclampPath(?string $path = null): string
    {
        return $this->magicLampPath.($path ? "/{$path}" : '');
    }

    public function shell(string $container, ?string $shell = null, string $user = 'root')
    {
        $shell = $shell ? $shell : 'sh -c "[ -f /bin/bash ] && /bin/bash || /bin/sh"';

        return $this->run($container, $shell, $user);
    }

    public function run(string $container, string $command, string $user = 'root')
    {
        return passthru("{$this->dockerComposePath} exec -u {$user} {$container} {$command}");
    }

    public function getContainerId(string $container): string
    {
        $process = $this->runCommand($this->dockerComposePath, 'ps', '-q', $container);

        return trim($process->getOutput());
    }

    public function relativePath(string $path)
    {
        if (strpos($path, $this->magicLampPath) === 0) {
            return str_replace($this->magicLampPath, '.', $path);
        }

        return $path;
    }

    public function restart(string $container)
    {
        $this->runCommand($this->dockerComposePath, 'restart', $container);
    }

    public function recreate(string $container)
    {
        $this->runCommand($this->dockerComposePath, 'up', '-d', $container);
    }

    public function stop(string $container)
    {
        $this->runCommand($this->dockerComposePath, 'stop', $container);
    }

    public function copy(string $container, string $source, string $destination)
    {
        $id = $this->getContainerId($container);

        $this->runCommand($this->dockerPath, 'cp', "{$id}:{$source}", $destination);
    }

    public function getError(): string
    {
        return $this->error;
    }

    protected function runCommand(...$args)
    {
        $process = new Process($args);

        try {
            $process->mustRun();

            return $process;
        } catch (ProcessFailedException $e) {
            DockerExceptionParser::throw($e);
        }
    }
}