<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Address;

class AddressSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = \Faker\Factory::create();
        for ($i=0; $i < 20; $i++) { 
            $random_id = rand(1, 10);
            Address::create([
                'customer_id'   => $random_id,
                'address'   	=> $faker->streetAddress,
                'district'      => $faker->citySuffix,
                'city'          => $faker->city,
                'province'      => $faker->state,
                'postal_code'   => $faker->postcode,
            ]);
        }
    }
}
