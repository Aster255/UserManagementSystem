<?php

namespace Tests\Feature\API;

use Tests\TestCase;
use App\Models\User;

class IndexTest extends TestCase
{
    /**
     * 
     */
    public function test_user_index_successful(): void
    {
        $user = User::factory()->create();

        $token = $user->createToken('TestToken')->plainTextToken;

        $response = $this->withHeaders([
            'Authorization' => 'Bearer ' . $token,
            'Accept' => 'application/json',
        ])->get('/api/users');

        $response->assertStatus(200);
    }

    public function test_user_index_failure(): void
    {
        $user = User::factory()->create();

        $response = $this->withHeaders([
            'Accept' => 'application/json',
        ])->post('/api/users');

        $response->assertStatus(401);
    }


}
