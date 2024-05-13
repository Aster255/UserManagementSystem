<?php

namespace Tests\Feature\API\User;

use Tests\TestCase;
use App\Models\User;

class ShowTest extends TestCase
{
    /**  
     * 
     */
    public function test_user_show_successful(): void
    {
        $user = User::factory()->create();

        $token = $user->createToken('TestToken')->plainTextToken;

        $response = $this->withHeaders([
            'Authorization' => 'Bearer ' . $token,
            'Accept' => 'application/json',
        ])->get('/api/users/' . $user->id);

        $response->assertStatus(200);
    }

    public function test_user_show_unauthorized(): void
    {
        $user = User::factory()->create();

        $response = $this->withHeaders([
            'Accept' => 'application/json',
        ])->get('/api/users/' . $user->id);

        $response->assertStatus(401);
    }


}
