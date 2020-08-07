<?php

namespace App\Commands;

use App\Docker\DockerComposeFile;
use App\Docker\Exception\DockerFileNotFoundException;
use App\DockerCommand;
use Symfony\Component\Process\Process;

class EditCommand extends DockerCommand
{
    /**
     * The signature of the command.
     *
     * @var string
     */
    protected $signature = 'edit {container} {file}';

    /**
     * The description of the command.
     *
     * @var string
     */
    protected $description = 'Edit file in a magicLAMP container';

    protected bool $requiresDocker = true;

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle(DockerComposeFile $compose)
    {
        $this->ensureDockerIsRunning();

        $container = $this->argument('container');
        $containerPath = $this->argument('file');
        $directory = $this->docker->getMagiclampPath().'/conf/'.$container.'/'.trim(pathinfo($containerPath, PATHINFO_DIRNAME), '/');
        $hostPath = $directory.'/'.pathinfo($containerPath, PATHINFO_BASENAME);

        if (file_exists($hostPath)) {
            $this->editFile($compose, $container, $containerPath, $hostPath);
            $this->recreateContainer($container);
            
            exit(0);
        }

        $this->host->createDirectory($directory);

        try {
            $this->docker->copy(
                $container,
                $containerPath,
                $hostPath
            );
        } catch (DockerFileNotFoundException $e) {
            $this->warn($e->getContainerFile()." does not exist in the {$container} container.");

            if (! $this->confirm('Would you like to create it anyway?')) {
                exit(0);
            }
        }

        $this->editFile($compose, $container, $containerPath, $hostPath);
        $this->recreateContainer($container);
    }

    protected function editFile(DockerComposeFile $compose, string $container, string $containerPath, string $hostPath)
    {
        $process = new Process([getenv('EDITOR') ?: 'nano', $hostPath]);
        $process->setTty(true);

        $process->mustRun();

        $compose->setVolume($container, $containerPath, $this->docker->relativePath($hostPath));
        $compose->save();
    }

    protected function recreateContainer(string $container)
    {
        $this->info("\n File updated.");

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
