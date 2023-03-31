<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Teacher;

class TeachersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Teacher::create([
            'name' => 'John Doe',
            'email' => 'john.doe@example.com',
            'cref' => '123456',
            'phone' => '45999999998'
        ]);

        Teacher::create([
            'name' => 'Jane Doe',
            'email' => 'jane.doe@example.com',
            'cref' => '789012',
            'phone' => '45999999999'
        ]);

        Teacher::create([
            'name' => 'Bob Smith',
            'email' => 'bob.smith@example.com',
            'cref' => '345678',
            'phone' => '45999999997'
        ]);
    }
}