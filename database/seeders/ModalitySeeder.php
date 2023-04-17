<?php

namespace Database\Seeders;

use App\Models\Modality;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ModalitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Modality::create([
            'name' => 'Futsal',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        Modality::create([
            'name' => 'Ginastica Rítmica',
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
