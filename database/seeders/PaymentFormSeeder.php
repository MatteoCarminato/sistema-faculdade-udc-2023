<?php

namespace Database\Seeders;

use App\Models\PaymentForm;
use Illuminate\Database\Seeder;

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
            'forma_pagamento' => 'Cartão de Crédito',
        ]);

        PaymentForm::create([
            'forma_pagamento' => 'Boleto Bancário',
        ]);

        PaymentForm::create([
            'forma_pagamento' => 'Transferência Bancária',
        ]);
    }
}
