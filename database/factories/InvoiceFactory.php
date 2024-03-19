<?php

namespace Database\Factories;

use App\Models\Customer;
use App\Models\Invoice;
use Illuminate\Database\Eloquent\Factories\Factory;


class InvoiceFactory extends Factory
{
    /**
     * Define the model's default state.
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $customer = Customer::inRandomOrder()->pluck('id')->first();
        return [
//            'customer_id' => Customer::factory(),
            'customer_id' => $customer,
            'date' => $this->faker->date(),
            'amount' => $this->faker->randomFloat('2', '10000', '99999999'),
            'status' => $this->faker->randomElement([Invoice::STATUS_PAID, Invoice::STATUS_UNPAID, Invoice::STATUS_CANCELLED]),
        ];
    }
}
