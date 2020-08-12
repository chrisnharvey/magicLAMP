<?php

namespace App\Commands;

use Exception;
use App\DockerCommand;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Support\Facades\Http;
use LaravelZero\Framework\Commands\Command;

class UpdateCheckCommand extends DockerCommand
{
    /**
     * The signature of the command.
     *
     * @var string
     */
    protected $signature = 'update-check {--safe : Hide any errors that may occur}';

    /**
     * The description of the command.
     *
     * @var string
     */
    protected $description = 'Check if a new version of magicLAMP is available';

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        try {
            $currentVersion = trim(file_get_contents('/.magiclamp-version'));

            if (! str_contains($currentVersion, '.')) {
                if (! $this->option('safe')) {
                    $this->error('Unable to check for updates');
                }

                $this->warn("You are running a development build of magicLAMP");

                return;
            }

            $latestVersion = $this->getLatestVersionTag();

            if (version_compare($latestVersion, $currentVersion) === 1) {
                $this->info("A new version of magicLAMP is available ({$latestVersion})");
                $this->line('To upgrade, see https://magiclamp.app/en/stable/getting-started/updating-magiclamp');
            } elseif (! $this->option('safe')) {
                $this->info('No updates available');
            }
        } catch (Exception $e) {
            if (! $this->option('safe')) {
                throw $e;
            }
        }
    }

    protected function getLatestVersionTag()
    {
        $response = Http::get('https://api.github.com/repos/chrisnharvey/magicLAMP/releases')->throw();

        $latestVersion = collect(
            $response->json()
        )->first();

        return ltrim($latestVersion['tag_name'], 'v');
    }
}
