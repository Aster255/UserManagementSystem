<?php

namespace Tests\Feature\API;

use Tests\TestCase;
use App\Models\User;

class LogoutTest extends TestCase
{
    /**
     * 
     */
    public function test_user_logout_successful(): void
    {
        $user = User::factory()->create();


        $token = $user->createToken('TestToken')->plainTextToken;

        $response = $this->withHeaders([
            'Authorization' => 'Bearer ' . $token,
            'Accept' => 'application/json',
        ])->post('/api/logout');

        $response->assertStatus(200);
    }

    public function test_user_logout_failure(): void
    {
        $user = User::factory()->create();

        $response = $this->withHeaders([
            'Accept' => 'application/json',
        ])->post('/api/logout');

        $response->assertStatus(401);
    }


}
