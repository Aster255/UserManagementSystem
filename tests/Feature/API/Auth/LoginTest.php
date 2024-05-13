<?php

namespace Tests\Feature\API;

use Tests\TestCase;
use App\Models\User;

class LoginTest extends TestCase
{
    /**
     * 
     */
    public function test_user_login_successful(): void
    {
        $user = User::factory()->create();

        $response = $this->post('/api/login', [
            'email' => $user->email,
            'password' => 'password',
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

    public function test_user_login_failure(): void
    {
        $user = User::factory()->create();

        $response = $this->post('/api/login', [
            'email' => $user->email,
            'password' => 'passwordz',
        ]);

        $response->assertStatus(403);
    }

}
