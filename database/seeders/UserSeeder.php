<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $email = fake()->unique()->email;
        DB::table('users')->insert([
            'name' => fake()->name,
            'email' => $email,
            'password' => Hash::make($email),
        ]);
    }
}
