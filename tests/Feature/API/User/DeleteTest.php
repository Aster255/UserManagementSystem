<?php

namespace Tests\Feature\API\User;

use Tests\TestCase;
use App\Models\User;

class DeleteTest extends TestCase
{
    /**  
     * 
     */
    public function test_user_delete_successful(): void
    {
        $testuser = User::factory()->create();
        $user = User::factory()->create();

        $token = $user->createToken('TestToken')->plainTextToken;

        $response = $this->withHeaders([
            'Authorization' => 'Bearer ' . $token,
            'Accept' => 'application/json',
        ])->delete('/api/users/' . $testuser->id);

        $response->assertStatus(200);
    }

    public function test_user_delete_unauthorized(): void
    {
        $testuser = User::factory()->create();
        $user = User::factory()->create();

        $token = $user->createToken('TestToken')->plainTextToken;

        $response = $this->withHeaders([
            'Accept' => 'application/json',
        ])->delete('/api/users/' . $testuser->id);

        $response->assertStatus(401);
    }


}
