<?php

namespace Database\Seeders;

use App\Models\Country;
use Illuminate\Database\Seeder;

class CountrySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Country::create([
            'name' => 'Brasil',
            'acronym' => 'BR',
            'slug' => 'brasil',
            'phone_code' => 55,
            'flag' => 'br.png',
        ]);

        Country::create([
            'name' => 'Estados Unidos',
            'acronym' => 'EUA',
            'slug' => 'estados-unidos',
            'phone_code' => 1,
            'flag' => 'us.png',
        ]);

        Country::create([
            'name' => 'Argentina',
            'acronym' => 'ARG',
            'slug' => 'argentina',
            'phone_code' => 54,
            'flag' => 'ar.png',
        ]);
    }
}
