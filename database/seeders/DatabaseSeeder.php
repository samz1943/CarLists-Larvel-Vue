<?php

namespace Database\Seeders;

use App\Models\Admin;
use App\Models\Car;
use App\Models\CarAvailability;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\DB;
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

        DB::statement('SET FOREIGN_KEY_CHECKS = 0');

        Admin::truncate();
        User::truncate();
        Car::truncate();
        CarAvailability::truncate();

        Admin::factory(1)->create([
            'email' => 'admin@test.com',
            'password' => Hash::make('12341234'),
        ]);

        User::factory(30)->create()->each(
            function($user) {
                if ($user->verified && $user->product_manager) {
                    Car::factory(rand(1,3))->create()->each(
                        function($car) {
                          CarAvailability::factory()->create(['car_id' => $car->id]);
                        }
                    );
                }
            }
        );

        Artisan::call('passport:install',['-vvv' => true]);
    }
}
