<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Address;
use Database\Factories\AddressFactory;

class AddressTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    use RefreshDatabase, WithFaker;

    public function testStore()
    {
        $response = $this->postJson('/api/address', [
            'customer_id'   => $this->faker->randomElement([1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20]),
            'address'   	=> $this->faker->address,
            'district'      => $this->faker->postcode,
            'city'          => $this->faker->city,
            'province'      => $this->faker->state,
            'postal_code'   => $this->faker->postcode,
        ]);

        $response->assertStatus(200);
    }

    public function testShow()
    {
        // $customer = factory(\App\Models\Customer::class)->create();
        $address = Address::factory()->create();

        $response = $this->getJson("/api/address/{$address->id}");

        $response->assertStatus(200); // 200 OK
        $response->assertJsonFragment([
            'id'            => $address->id,
            'customer_id'   => $address->customer_id,
            'address'       => $address->address,
            'district'      => $address->district,
            'city'          => $address->city,
            'province'      => $address->province,
            'postal_code'   => $address->postal_code,
            'created_at'    => $address->created_at,
            'updated_at'    => $address->updated_at,
        ]);
    }

    public function testUpdate()
    {
        // $customer = factory(\App\Models\Customer::class)->create();
        $address = Address::factory()->create();

        $response = $this->putJson("/api/address/{$address->id}", [
            'customer_id'   => $this->faker->randomElement([1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20]),
            'address'   	=> $this->faker->address,
            'district'      => $this->faker->postcode,
            'city'          => $this->faker->city,
            'province'      => $this->faker->state,
            'postal_code'   => $this->faker->postcode,
        ]);

        $response->assertStatus(200); // 200 OK
        $response->assertJson([
            'msg' => 'Address updated successfully',
        ]);
    }

    public function testDelete()
    {
        // $customer = factory(\App\Models\Customer::class)->create();
        $address = Address::factory()->create();

        $response = $this->deleteJson("/api/address/{$address->id}");
        $response->assertStatus(200); // 204 No Content
        $response->assertJson([
            'msg' => 'Address deleted successfully',
        ]);
    }
}