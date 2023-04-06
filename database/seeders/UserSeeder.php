<?php

namespace Database\Seeders;

use App\Models\User;
use App\Enums\UserType;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::factory()->count(1)->create()->each(function($user){
            $user->assignRole(UserType::ADMIN);
        });
        User::factory()->count(1)->create()->each(function($user){
            $user->assignRole(UserType::DRIVER);
        });
        User::factory()->count(1)->create()->each(function($user){
            $user->assignRole(UserType::CLIENT);
        });
    }
}
