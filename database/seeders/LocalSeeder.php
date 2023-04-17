<?php

namespace Database\Seeders;

use App\Models\Local;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LocalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Local::create([
            'name' => 'Quadra de Futsal',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        Local::create([
            'name' => 'Campo',
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
