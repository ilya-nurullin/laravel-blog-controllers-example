<?php

namespace App\Console\Commands;

use App\Repo\User\UserRepo;
use App\Services\UserService;
use Illuminate\Console\Command;
use Illuminate\Support\Str;
use Illuminate\Contracts\Console\PromptsForMissingInput;

class UpdateUserPassword extends Command implements PromptsForMissingInput
{
    protected $signature = 'app:update-user-password
                                {userId : id from users table}
                                {password? : a password to set for a user}
                                {--m|mail : whether to send email}
                                {--s|show : whether to show password}
                                {--r|random-password : skip all and generate random password}
                                {--l|random-password-length=12 : random password length to generate}
                                ';


    protected $description = 'Updates user\'s password';

    public function handle(UserService $userService, UserRepo $userRepo)
    {
        $randomPasswordLength = (int)$this->option('random-password-length');
        $userId = $this->argument('userId');
        $password = $this->argument('password');

        if ($this->option('random-password')){
            $password = Str::password($randomPasswordLength);
        } else if (empty($password)) {
            $passwordMode = $this->choice("Fill or random", ["fill", "random"], 0);
            if ($passwordMode === "fill") {
                $password = $this->secret("New password", "pass");
            }
            else {
                $password = Str::password($randomPasswordLength);
            }
        }

        $user = $userRepo->findAuthor($userId);

        $userService->changePassword($user, $password);

        if ($this->option('mail')) {
            $this->line("Email is sent");
        }

        $passwordOutput = ($this->option('show')) ? $password : '<secret>';

        $this->info("Password ({$passwordOutput}) is successfully changed for {$user->email} (#{$user->id})");
    }
}
