<?php

namespace Database\Seeders;

use App\Models\Group;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GroupSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Group::create([
            'name' => 'Turma - Pré Mirim I',
            'category_id' => 1,
            'modality_id' => 1,
            'status' => 'ativo',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        Group::create([
            'name' => 'Turma - Pré Mirim II',
            'category_id' => 1,
            'modality_id' => 1,
            'status' => 'ativo',
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
