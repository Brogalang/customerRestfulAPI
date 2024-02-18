<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Customer;

class CustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = \Faker\Factory::create();
        $gender = $faker->randomElement(['M', 'F']);
        $title = $faker->randomElement(['Mr', 'Mrs']);
        $phoneNumber = $this->generatePhoneNumber($faker);
        for ($i=0; $i < 10; $i++) { 
            Customer::create([
                'title'         => $title,
                'name'          => $faker->name,
                'gender'        => $gender,
                'phone_number'  => $phoneNumber,
                'email'         => $faker->email
            ]);
        }
    }

    private function generatePhoneNumber($faker)
    {
        // You can customize the format of the phone number based on your needs
        return $faker->numerify('####-####-####');
    }
}
