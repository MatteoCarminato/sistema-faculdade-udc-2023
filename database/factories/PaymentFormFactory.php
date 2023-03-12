<?php

namespace Database\Factories;

use App\Models\PaymentForm;
use Illuminate\Database\Eloquent\Factories\Factory;

class PaymentFormFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = PaymentForm::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'forma_pagamento' => $this->faker->word,
        ];
    }
}
