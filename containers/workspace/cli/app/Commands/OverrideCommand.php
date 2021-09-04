<?php

namespace App\Commands;

use App\DockerCommand;
use Illuminate\Console\Scheduling\Schedule;
use LaravelZero\Framework\Commands\Command;
use Symfony\Component\Process\Process;

class OverrideCommand extends DockerCommand
{
    /**
     * The signature of the command.
     *
     * @var string
     */
    protected $signature = 'override';

    /**
     * The description of the command.
     *
     * @var string
     */
    protected $description = 'Opens the docker-compose.override.yml file for editing';

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $origHash = hash_file('sha256', $this->docker->getMagiclampPath('docker-compose.override.yml'));

        $process = new Process([getenv('EDITOR') ?: 'nano', $this->docker->getMagiclampPath('docker-compose.override.yml')]);
        $process->setTty(true);

        $process->mustRun();

        $newHash = hash_file('sha256', $this->docker->getMagiclampPath('docker-compose.override.yml'));

        if ($origHash == $newHash) {
            $this->info("\n File unchanged.");

            exit(0);
        }

        $this->info("\n File updated.");

        if (! $this->docker->isAvailable()) {
            exit(0);
        }

        $this->info("\n magicLAMP must now be restarted for your changes to take effect.");
        $this->warn(' This will kill all active processes within magicLAMP.');
        $this->warn(' The shell will restart automatically after restarting.');

        if (! $this->confirm("Would you like to restart magicLAMP now?")) {
            exit(0);
        }

        touch(
            $this->docker->getMagiclampPath('.revive')
        );

        $this->docker->stop('workspace');
    }
}
