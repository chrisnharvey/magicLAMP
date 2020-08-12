<?php

namespace App\Commands;

use App\DockerCommand;
use Illuminate\Console\Scheduling\Schedule;
use LaravelZero\Framework\Commands\Command;

class RunCommand extends DockerCommand
{
    /**
     * The signature of the command.
     *
     * @var string
     */
    protected $signature = 'run {container} {cmd} {--user=root}';

    /**
     * The description of the command.
     *
     * @var string
     */
    protected $description = 'Run a command in one of the magicLAMP docker containers';

    protected bool $requiresDocker = true;

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $this->docker->run(
            $this->argument('container'),
            $this->argument('cmd'),
            $this->option('user')
        );
    }
}
