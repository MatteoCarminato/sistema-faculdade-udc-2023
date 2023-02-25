<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\PaymentForm;

class PaymentFormSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        PaymentForm::create([
            'forma_pagamento' => 'Cartão de Crédito'
        ]);

        PaymentForm::create([
            'forma_pagamento' => 'Boleto Bancário'
        ]);

        PaymentForm::create([
            'forma_pagamento' => 'Transferência Bancária'
        ]);
    }
}