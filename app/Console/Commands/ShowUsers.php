<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;

class ShowUsers extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:show-users
                                {userIds* : user ids}
                                {--H|header=* : column in db}
                                ';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Describe users';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $headers = $this->option('header');
        $userIds = ($this->argument('userIds'));
        $rows = User::whereIn('id', $userIds)->select($headers)->get();

        $this->table($headers, $rows);
    }
}
