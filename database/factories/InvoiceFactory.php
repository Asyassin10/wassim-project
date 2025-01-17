<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Invoice>
 */
class InvoiceFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'client_id' => \App\Models\Client::factory(),
            'invoice_date' => $this->faker->date(),
            'total_amount' => $this->faker->randomFloat(2, 100, 10000),
        ];
    }
}
