<?php

namespace App\Commands;

use App\Docker\DockerComposeFile;
use App\DockerCommand;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Support\Str;
use LaravelZero\Framework\Commands\Command;

class ProxyCommand extends DockerCommand
{
    /**
     * The signature of the command.
     *
     * @var string
     */
    protected $signature = '
        proxy
        {domain}
        {containerPort}
        {--container=workspace}
    ';

    /**
     * The description of the command.
     *
     * @var string
     */
    protected $description = 'Proxy a domain to a port with nginx';

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle(DockerComposeFile $compose)
    {
        $container = $this->option('container');
        $domain = $this->argument('domain');
        $containerPort = $this->argument('containerPort');

        if (! Str::endsWith($domain, '.localhost')) {
            $this->warn(' The domain you supplied does not end with .magiclamp.localhost or .localhost.');
            $this->warn(' Automatic DNS and Automatic SSL will be unavailable for this entry');
        } elseif (! Str::endsWith($domain, 'magiclamp.localhost')) {
            $this->warn(' The domain you supplied ends with .localhost, but not .magiclamp.localhost.');
            $this->warn(' Automatic SSL will be unavailable for this entry');
        }

        $containerPath = '/etc/nginx/conf.d/' . $this->argument('domain') . '.conf';

        $directory = $this->docker->getMagiclampPath().'/conf/nginx/'.trim(pathinfo($containerPath, PATHINFO_DIRNAME), '/');
        $hostPath = $directory.'/'.pathinfo($containerPath, PATHINFO_BASENAME);

        if (file_exists($hostPath)) {
            $this->warn(" {$domain} is already proxied.");

            if (! $this->confirm('Would you like to replace it?')) {
                exit(0);
            }
        } else {
            $this->info(" {$domain} will be added and proxied to port {$containerPort} on the {$container} container");
            if (! $this->confirm("Do you want to continue?")) {
                exit(0);
            }

            $this->host->createDirectory($directory);
        }

        $stub = file_get_contents(base_path('stubs/nginx-proxy.stub'));
        $stub = str_replace(['{domain}', '{proxyUrl}'], [$domain, "http://{$container}:{$containerPort}"], $stub);

        file_put_contents($hostPath, $stub);

        $compose->setVolume('nginx', $containerPath, $this->docker->containerPathToHostPath($hostPath));
        $compose->save();

        $this->info("\n File updated.");

        $this->info(" The nginx container must be restarted for your changes to take effect");

        if (! $this->confirm("Would you like to restart nginx now?")) {
            exit(0);
        }

        $this->docker->recreate('nginx');

        $this->info(' Done.');
    }

    /**
     * Define the command's schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule $schedule
     * @return void
     */
    public function schedule(Schedule $schedule): void
    {
        // $schedule->command(static::class)->everyMinute();
    }
}
