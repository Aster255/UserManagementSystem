<?php

namespace Tests\Feature\API\User;

use Tests\TestCase;
use App\Models\User;

class EditTest extends TestCase
{
    /**  
     * 
     */
    public function test_user_edit_successful(): void
    {
        $user = User::factory()->create();

        $token = $user->createToken('TestToken')->plainTextToken;

        $userData = [
            'first_name' => "Paul",
        ];

        $response = $this->withHeaders([
            'Authorization' => 'Bearer ' . $token,
            'Accept' => 'application/json',
        ])->json('PATCH', '/api/users/' . $user->id, $userData);

        $response->assertJsonStructure([
            'data' => [
                'id',
                'attributes'
            ]
        ]);

        $response->assertStatus(200);
    }

    public function test_user_edit_unauthorized(): void
    {
        $user = User::factory()->create();

        $userData = [
            'first_name' => "Paul",
        ];

        $response = $this->withHeaders([
            'Accept' => 'application/json',
        ])->json('PATCH', '/api/users/' . $user->id, $userData);

        $response->assertStatus(401);
    }


}
