<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Address;

class AddressFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    protected $model = Address::class;
    public function definition()
    {
        return [
            'customer_id'   => $this->faker->randomElement([1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20]),
            'address'   	=> $this->faker->address,
            'district'      => $this->faker->postcode,
            'city'          => $this->faker->city,
            'province'      => $this->faker->state,
            'postal_code'   => $this->faker->postcode,
        ];
    }
}
