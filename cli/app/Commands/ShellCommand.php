<?php

namespace App\Commands;

use App\DockerCommand;
use Illuminate\Console\Scheduling\Schedule;

class ShellCommand extends DockerCommand
{
    /**
     * The signature of the command.
     *
     * @var string
     */
    protected $signature = 'shell {container} {shell?} {--user=root}';

    /**
     * The description of the command.
     *
     * @var string
     */
    protected $description = 'Open a shell into a magicLAMP container';

    protected bool $requiresDocker = true;

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $this->docker->shell(
            $this->argument('container'),
            $this->argument('shell'),
            $this->option('user')
        );
    }
}
