<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Faker\Factory;

class CreateFirstUser extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // --- User Admin Default ---
        User::create([
            'name' => 'Admin',
            'email' => 'gatot01@pcr.ac.id',
            'password' => Hash::make('gatotkaca'),
        ]);

        // Inisialisasi faker
        $faker = Factory::create();

        // --- Generate 100 user dummy ---
        foreach (range(1, 100) as $i) {
            User::create([
                'name'     => $faker->name,
                'email'    => $faker->unique()->safeEmail,
                'password' => Hash::make('password123'), // password sama biar mudah login
            ]);
        }
    }
}
