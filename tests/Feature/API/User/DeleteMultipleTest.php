<?php

namespace Tests\Feature\API\User;

use Tests\TestCase;
use App\Models\User;

class DeleteMultipleTest extends TestCase
{
    /**  
     * 
     */
    public function test_user_delete_multiple_successful(): void
    {
        User::factory(5)->create();
        $user = User::factory()->create();

        $token = $user->createToken('TestToken')->plainTextToken;


        $userData = [
            'user_ids' => [1, 2, 3, 5],
        ];

        $response = $this->withHeaders([
            'Authorization' => 'Bearer ' . $token,
            'Accept' => 'application/json',
        ])->delete('/api/users/destroy-multiple', $userData);

        $response->assertStatus(200);
    }

    public function test_user_delete_multiple_unauthorized(): void
    {
        User::factory(5)->create();
        $user = User::factory()->create();

        $token = $user->createToken('TestToken')->plainTextToken;


        $userData = [
            'user_ids' => [1, 2, 3, 5],
        ];

        $response = $this->withHeaders([
            'Accept' => 'application/json',
        ])->delete('/api/users/destroy-multiple', $userData);

        $response->assertStatus(401);
    }
}
