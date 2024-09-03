<?php

use App\Console\Commands\ShowUsers;
use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schedule;

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote')->hourly();

Artisan::command('test {asdf?}', function () {
    $this->line('test command');
});

Schedule::call(function (){
    echo "asdf";
})->everySecond()->everyFiveMinutes();

Schedule::call(function () {
    DB::table('recent_users')->delete();
})->daily();


Schedule::command(ShowUsers::class, ['1'])->everyMinute();

Schedule::exec('ls')
    ->hourlyAt(14)
    ->when(function (){
        $shouldRun = DB::shouldRun();
        return $shouldRun == "true";
    })
    ->environments(['local'])
    ->everyFiveMinutes()
    ->onOneServer();
