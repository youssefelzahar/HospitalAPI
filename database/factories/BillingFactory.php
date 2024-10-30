<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Billing>
 */
class BillingFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'cost'=>$this->faker->numberBetween(int1:10,   int2:1000),
        'type'=>$this->faker->randomElement(['half payed', 'unpayed', 'payed']),
        'dateofpayment'=>$this->faker->date(),
        ];
    }
}
