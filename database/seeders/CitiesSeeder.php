<?php

namespace Database\Seeders;

use App\Models\City;
use Illuminate\Database\Seeder;

class CitiesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        City::create([
            'name' => 'Rio de Janeiro',
            'slug' => 'rio-de-janeiro',
            'phone_code' => '21',
            'state_id' => 2,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        City::create([
            'name' => 'São Paulo',
            'slug' => 'sao-paulo',
            'phone_code' => '11',
            'state_id' => 1,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        City::create([
            'name' => 'Belo Horizonte',
            'slug' => 'belo-horizonte',
            'phone_code' => '31',
            'state_id' => 3,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        City::create([
            'name' => 'Campinas',
            'slug' => 'campinas',
            'phone_code' => '19',
            'state_id' => 1,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        City::create([
            'name' => 'Niterói',
            'slug' => 'niteroi',
            'phone_code' => '21',
            'state_id' => 2,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
