<?php

namespace Tests\Feature\WEB\User;

use Tests\TestCase;
use App\Models\User;

class UserCreationTest extends TestCase
{
    public function test_users_can_create_users(): void
    {
        $user = User::factory()->create();

        $email = fake()->email;

        $response = $this->actingAs($user)->post('/users', [
            'first_name' => "fname",
            'last_name' => "lname",
            'address' => "address",
            'postal_code' => "11165",
            'phone_number' => "09173885123",
            'username' => fake()->userName,
            'email' => $email,
            'password' => 'password',
            'password_confirmation' => 'password',
        ]);
        $newUser = User::where('email', $email)->first();
        $response->assertRedirect(route('users.show', $newUser->id));
    }
}
