<?php

namespace App\Docker;

use Symfony\Component\Yaml\Yaml;

class DockerComposeFile
{
    public function __construct(string $dockerComposeFile, string $dockerComposeOverrideFile)
    {
        $this->dockerComposeFile = $dockerComposeFile;
        $this->dockerComposeOverrideFile = $dockerComposeOverrideFile;

        $this->dockerComposeBase = Yaml::parseFile($this->dockerComposeFile);
        $this->dockerComposeOverride = Yaml::parseFile($this->dockerComposeOverrideFile);

        $this->dockerComposeConfig = array_merge_recursive($this->dockerComposeBase, $this->dockerComposeOverride);
    }

    public function save()
    {
        $yaml = Yaml::dump($this->dockerComposeOverride, 10);

        return file_put_contents($this->dockerComposeOverrideFile, $yaml);
    }

    public function exposePort(string $container, int $containerPort, ?int $hostPort = null)
    {
        $ports = $this->dockerComposeOverride['services'][$container]['ports'] ?? [];

        $ports[] = "{$hostPort}:{$containerPort}";

        $this->dockerComposeOverride['services'][$container]['ports'] = $ports;
    }

    public function setVolume(string $container, string $containerPath, string $hostPath)
    {
        $volumes = $this->dockerComposeOverride['services'][$container]['volumes'] ?? [];

        foreach ($volumes as $key => [$existingSource, $existingDesination]) {
            if ($existingSource == $existingDesination) {
                $volumes[$key] = "{$containerPath}:{$hostPath}";

                return;
            }
        }
        
        $volumes[] = "{$hostPath}:{$containerPath}";

        $this->dockerComposeOverride['services'][$container]['volumes'] = $volumes;
    }

    public function isHostPortExposed(int $port): bool
    {
        foreach ($this->getExposedPorts() as [$hostPort]) {
            if ($port == $hostPort) {
                return true;
            }
        }

        return false;
    }

    public function isContainerPortExposed(string $container, int $port): bool
    {
        foreach ($this->getExposedPorts($container) as [$hostPort, $containerPort]) {
            if ($port == $containerPort) {
                return true;
            }
        }

        return false;
    }

    public function getExposedPorts(?string $container = null)
    {
        foreach ($this->dockerComposeConfig['services'] as $service => $serviceData) {
            if ($container && $service != $container) {
                continue;
            }

            foreach (($serviceData['ports'] ?? []) as $port) {
                $parts = array_pad(
                    explode(':', strstr($port, '/', true) ?: $port),
                    -3,
                    null
                );

                yield array_slice($parts, -2, 2);
            }
        }
    }
}