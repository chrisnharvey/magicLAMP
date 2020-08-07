<?php

namespace App\Commands;

use App\Docker\DockerComposeFile;
use App\DockerCommand;
use Symfony\Component\Yaml\Yaml;

class ExposeCommand extends DockerCommand
{
    /**
     * The signature of the command.
     *
     * @var string
     */
    protected $signature = '
        expose
        {containerPort}
        {--host-port= : The port to bind to on the host. Defaults to the container port}
        {--container=workspace}
    ';

    /**
     * The description of the command.
     *
     * @var string
     */
    protected $description = 'Expose a port to the host';

    protected bool $requiresDocker = true;

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle(DockerComposeFile $compose)
    {
        $container = $this->option('container');
        $containerPort = $this->argument('containerPort');
        $hostPort = $this->option('host-port') ?: $containerPort;

        $compose = new DockerComposeFile(
            $this->docker->getMagiclampPath('docker-compose.yml'),
            $this->docker->getMagiclampPath('docker-compose.override.yml')
        );

        // Check port isn't already exposed to the host
        if ($compose->isHostPortExposed($hostPort)) {
            $this->error(
                "Port {$hostPort} is already exposed to the host"
            );

            exit(1);
        }

        if ($compose->isContainerPortExposed($container, $containerPort)) {
            $this->error(
                "Port {$containerPort} is already exposed on the {$container} container"
            );

            exit(1);
        }

        $compose->exposePort($container, $containerPort, $hostPort);
        $compose->save();

        $this->info("\n Port exposed.");

        $this->info(" The {$container} container must be restarted for your changes to take effect");

        if ($container == 'workspace') {
            $this->warn(' Restarting the worksapce container will kill all active processes within it.');
            $this->warn(' The shell will restart automatically after restarting.');
        }

        if (! $this->confirm("Would you like to restart {$container} now?")) {
            exit(0);
        }

        if ($container == 'workspace') {
            touch(
                $this->docker->getMagiclampPath('.revive')
            );

            $this->docker->stop($container);
        }

        $this->docker->recreate($container);

        $this->info('Done.');
    }
}
