<?php

namespace Tests\Feature\API;

use Tests\TestCase;
use App\Models\User;

class RegistrationTest extends TestCase
{
    /**
     * 
     */
    public function test_user_registration_successful(): void
    {
        $response = $this->post('/api/register', [
            'first_name' => "fname",
            'last_name' => "lname",
            'address' => "address",
            'postal_code' => "11165",
            'phone_number' => "09173885123",
            'username' => fake()->userName,
            'email' => fake()->email,
            'password' => 'password',
            'password_confirmation' => 'password',
        ]);

        $response->assertStatus(200);
        $response->assertJsonStructure([
            'status',
            'message',
            'data' => [
                'token'
            ]
        ]);
    }

    public function test_user_registration_failure_repeat_email(): void
    {
        $user = User::factory()->create();

        $response = $this->post('/api/register', [
            'first_name' => "fname",
            'last_name' => "lname",
            'address' => "address",
            'postal_code' => "11165",
            'phone_number' => "09173885123",
            'username' => "testusernamex",
            'email' => $user->email,
            'password' => 'password',
            'password_confirmation' => 'password',
        ]);

        $response->assertStatus(302);
    }
}
