<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\State;

class StatesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        State::create([
            'name' => 'São Paulo',
            'acronym' => 'SP',
            'slug' => 'sao-paulo',
            'country_id' => 1,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        State::create([
            'name' => 'Rio de Janeiro',
            'acronym' => 'RJ',
            'slug' => 'rio-de-janeiro',
            'country_id' => 1,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        State::create([
            'name' => 'Minas Gerais',
            'acronym' => 'MG',
            'slug' => 'minas-gerais',
            'country_id' => 1,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}