<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Account;

class AccountFactory extends Factory
{
    /**
    * The name of the factory's corresponding model.
    *
    * @var  string
    */
    protected $model = Account::class;

    /**
    * Define the model's default state.
    *
    * @return  array
    */
    public function definition(): array
    {
        return [
            'debt' => $this->faker->randomFloat(),
            'current_balance' => $this->faker->randomFloat(),
            'payment_status' => $this->faker->randomFloat(),
            'student_id' => \App\Models\Student::factory(),
        ];
    }
}
