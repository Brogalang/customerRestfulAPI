<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Customer;

class CustomerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */

    protected $model = Customer::class;
    public function definition()
    {
        return [
            'title'         => $this->faker->randomElement(['Mr', 'Mrs']),
            'name'          => $this->faker->name,
            'gender'        => $this->faker->randomElement(['M', 'F']),
            'phone_number'  => $this->faker->phoneNumber,
            'image'         => $this->faker->imageUrl,
            'email'         => $this->faker->email,
        ];
    }
}
