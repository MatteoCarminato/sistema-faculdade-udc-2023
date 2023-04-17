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
            'days' => 'Domingo',
            'hour' => '08:00:00',
            'teacher_id' => 1,
            'category_id' => 1,
            'locals_id' => 1,
            'modality_id' => 1,
            'created_at' => now(),
            'updated_at' => now()
        ]);

        Group::create([
            'name' => 'Turma - Pré Mirim II',
            'days' => 'Segunda',
            'hour' => '10:30:00',
            'teacher_id' => 1,
            'category_id' => 1,
            'locals_id' => 1,
            'modality_id' => 1,
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
