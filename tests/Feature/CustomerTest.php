<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Customer;
use Database\Factories\CustomerFactory;

class CustomerTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    use RefreshDatabase, WithFaker;

    public function testStore()
    {
        $response = $this->postJson('/api/customer', [
            'title'         => $this->faker->randomElement(['Mr', 'Mrs']),
            'name'          => $this->faker->name,
            'gender'        => $this->faker->randomElement(['M', 'F']),
            'phone_number'  => $this->faker->phoneNumber,
            'image'         => $this->faker->imageUrl,
            'email'         => $this->faker->email,
        ]);

        $response->assertStatus(200);
    }

    public function testShow()
    {
        // $customer = factory(\App\Models\Customer::class)->create();
        $customer = Customer::factory()->create();

        $response = $this->getJson("/api/customer/{$customer->id}");

        $response->assertStatus(200); // 200 OK
        $response->assertJsonFragment([[
            'id'            => $customer->id,
            'title'         => $customer->title,
            'name'          => $customer->name,
            'gender'        => $customer->gender,
            'phone_number'  => $customer->phone_number,
            'image'         => $customer->image,
            'email'         => $customer->email,
            'created_at'    => $customer->created_at,
            'updated_at'    => $customer->updated_at,
            'address'       => [],
        ]]);
    }

    public function testUpdate()
    {
        // $customer = factory(\App\Models\Customer::class)->create();
        $customer = Customer::factory()->create();

        $response = $this->putJson("/api/customer/{$customer->id}", [
            'title'         => $this->faker->randomElement(['Mr', 'Mrs']),
            'name'          => $this->faker->name,
            'gender'        => $this->faker->randomElement(['M', 'F']),
            'phone_number'  => $this->faker->phoneNumber,
            'image'         => $this->faker->imageUrl,
            'email'         => $this->faker->email,
        ]);

        $response->assertStatus(200); // 200 OK
        $response->assertJson([
            'msg' => 'Customer update successfully',
        ]);
    }

    public function testDelete()
    {
        // $customer = factory(\App\Models\Customer::class)->create();
        $customer = Customer::factory()->create();

        $response = $this->deleteJson("/api/customer/{$customer->id}");
        $response->assertStatus(200); // 204 No Content
        $response->assertJson([
            'msg' => 'Customer deleted successfully',
        ]);
    }
}
