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
            $currentVersion = trim(file_get_contents($this->docker->getMagiclampPath('.version')));
            $latestVersion = $this->getLatestVersionTag();

            if (version_compare($latestVersion, $currentVersion) === 1) {
                $this->info("A new version of magicLAMP is available ({$latestVersion})");
                $this->line('To upgrade, see https://magiclamp.app/en/stable/getting-started/updating-magiclamp');
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

        return $latestVersion['tag_name'];
    }
}
