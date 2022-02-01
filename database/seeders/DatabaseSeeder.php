<?php

namespace Database\Seeders;

use App\Models\Admin;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        Admin::factory(1)->create([
            'email' => 'admin@test.com',
            'password' => Hash::make('12341234'),
        ]);

        Artisan::call('passport:install',['-vvv' => true]);
    }
}
