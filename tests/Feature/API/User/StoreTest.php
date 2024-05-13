<?php

namespace Tests\Feature\API\User;

use Tests\TestCase;
use App\Models\User;

class StoreTest extends TestCase
{
    /**
     * 
     */
    public function test_user_store_successful(): void
    {
        $user = User::factory()->create();

        $token = $user->createToken('TestToken')->plainTextToken;

        $userData = [
            'first_name' => "fname",
            'last_name' => "lname",
            'address' => "address",
            'postal_code' => "11165",
            'phone_number' => "09173885123",
            'username' => fake()->userName,
            'email' => fake()->email,
            'password' => 'password',
            'password_confirmation' => 'password',
        ];

        $response = $this->withHeaders([
            'Authorization' => 'Bearer ' . $token,
            'Accept' => 'application/json',
        ])->post('/api/users', $userData);

        $response->assertStatus(201);
    }

    public function test_user_store_unauthorized(): void
    {
        $user = User::factory()->create();

        $userData = [
            'first_name' => "fname",
            'last_name' => "lname",
            'address' => "address",
            'postal_code' => "11165",
            'phone_number' => "09173885123",
            'username' => fake()->userName,
            'email' => fake()->email,
            'password' => 'password',
            'password_confirmation' => 'password',
        ];

        $response = $this->withHeaders([
            'Accept' => 'application/json',
        ])->post('/api/users', $userData);

        $response->assert(401);
    }


}
