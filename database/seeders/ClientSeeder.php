<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ClientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('clients')->insert([
            [
                'name' => 'Aluno - John Doe',
                'nickname' => 'JD',
                'birth_date' => '1990-01-01',
                'phone' => '123456789',
                'phone_home' => '987654321',
                'email' => 'johndoe@example.com',
                'rg' => '1234567',
                'cpf' => '123456789',
                'sex' => 'Male',
                'type' => 'aluno',
                'blood_types' => 'a+',
                'height' => 1.75,
                'weight' => 70.5,
                'school' => 'Example School',
                'shift' => 'manha',
                'address' => '123 Example Street',
                'city_id' => 1,
                'zip_code' => '12345-678',
                'number' => '123',
                'complements' => 'Apartment 4B',
                'district' => 'Example District',
                'active' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Reponsável - John Doe',
                'nickname' => 'JD',
                'birth_date' => '1990-01-01',
                'phone' => '123456789',
                'phone_home' => '987654321',
                'email' => 'johndoe@example.com',
                'rg' => '1234567',
                'cpf' => '123456789',
                'sex' => 'Male',
                'type' => 'responsavel',
                'blood_types' => 'a+',
                'height' => 1.75,
                'weight' => 70.5,
                'school' => 'Example School',
                'shift' => 'manha',
                'address' => '123 Example Street',
                'city_id' => 1,
                'zip_code' => '12345-678',
                'number' => '123',
                'complements' => 'Apartment 4B',
                'district' => 'Example District',
                'active' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // Adicione mais registros de clientes aqui, se necessário
        ]);
    }
}