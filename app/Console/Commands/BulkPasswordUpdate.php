<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;

class BulkPasswordUpdate extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:bulk-password-update {password} {userIds*}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';
    private bool $shouldKeepRunning = true;

    /**
     * Execute the console command.
     */
    public function handle()
    {
//        $this->trap(, fn () => $this->shouldKeepRunning = false);

        $userIds = $this->argument('userIds');
        $password = $this->argument('password');

        $this->withProgressBar($userIds, function ($userId) use ($password) {
            sleep(4);
            Artisan::call(\App\Console\Commands\UpdateUserPassword::class, [
                'userId' => $userId,
                'password' => $password
            ]);

            if (!$this->shouldKeepRunning)
                $this->fail('Stopped by SIGTERM');
        });
        $this->newLine();
        $this->line('All done');

//        $progressBar = $this->output->createProgressBar(count($userIds));
//
//        $progressBar->start();
//        foreach ($userIds as $userId) {
//            Artisan::call(\App\Console\Commands\UpdateUserPassword::class, [
//                'userId' => $userId,
//                'password' => $password
//            ]);
//            $progressBar->advance();
//        }
//        $progressBar->finish();
//
//        $this->newLine();
//
//        $this->line('All done');
    }
}
