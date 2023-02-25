<?php
use App\Models\PaymentTerm;
use Illuminate\Database\Eloquent\Factories\Factory;

class PaymentTermFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = PaymentTerm::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'condicao_pagamento' => $this->faker->unique()->word(),
            'multa' => $this->faker->randomFloat(2, 0, 100),
            'juro' => $this->faker->randomFloat(2, 0, 100),
            'desconto' => $this->faker->randomFloat(2, 0, 100),
            'qtd_parcelas' => $this->faker->randomNumber(1),
        ];
    }
}
