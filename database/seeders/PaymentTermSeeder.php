<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\PaymentTerm;


class PaymentTermSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        PaymentTerm::create([
            'condicao_pagamento' => 'À vista',
            'multa' => 0,
            'juro' => 0,
            'desconto' => 0,
            'qtd_parcelas' => 1,
        ])->installments()->createMany([
            [
                'parcela' => 1,
                'dias' => 0,
                'porcentual' => 0,
                'payment_form_id' => 1
            ],
        ]);

        PaymentTerm::create([
            'condicao_pagamento' => '30 dias',
            'multa' => 2,
            'juro' => 1,
            'desconto' => 5,
            'qtd_parcelas' => 1,
        ])->installments()->createMany([
            [
                'parcela' => 1,
                'dias' => 30,
                'porcentual' => 0,
                'payment_form_id' => 1
            ],
        ]);

        PaymentTerm::create([
            'condicao_pagamento' => '60 dias',
            'multa' => 2,
            'juro' => 2,
            'desconto' => 5,
            'qtd_parcelas' => 1,
        ])->installments()->createMany([
            [
                'parcela' => 1,
                'dias' => 60,
                'porcentual' => 0,
                'payment_form_id' => 2
            ],
        ]);
    }
}