<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            CountrySeeder::class,
            PaymentFormSeeder::class,
            PaymentTermSeeder::class,
            StatesSeeder::class,
            CitiesSeeder::class,
            TeachersSeeder::class,
            LocalSeeder::class,
            CategorySeeder::class,
            ModalitySeeder::class,
            // GroupSeeder::class,
            ClientSeeder::class
        ]);
    }
}
