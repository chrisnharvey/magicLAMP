<?php

namespace App\Providers;

use App\Commands\InspiringCommand;
use App\Docker\Docker;
use App\Docker\DockerComposeFile;
use Illuminate\Console\Application as Artisan;
use Illuminate\Console\Events\CommandStarting;
use Illuminate\Support\Facades\Event;
use Illuminate\Support\ServiceProvider;
use RuntimeException;
use Symfony\Component\Process\Exception\ProcessFailedException;
use Symfony\Component\Process\Process;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot(Docker $docker)
    {
        if ($docker->isAvailable()) {
            return;
        }

        Event::listen(CommandStarting::class, function ($event) {
            if (in_array($event->command, [null, 'list'])) {
                $event->output->writeln(
                    "\n  <fg=red;options=bold>Unable to connect to Docker. Most commands will be unavailable.</>".
                    "\n  <fg=red;options=bold>Try running as root (with sudo)</>"
                );
            }
        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(Docker::class, function ($app) {
            return new Docker('docker', 'docker-compose', getenv('MAGICLAMP_PATH') ?: '/magicLAMP');
        });

        $this->app->bind(DockerComposeFile::class, function ($app) {
            return new DockerComposeFile(
                $app[Docker::class]->getMagiclampPath('docker-compose.yml'),
                $app[Docker::class]->getMagiclampPath('docker-compose.override.yml')
            );
        });
    }
}
