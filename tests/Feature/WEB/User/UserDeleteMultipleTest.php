<?php

namespace Tests\Feature\WEB\User;

use Tests\TestCase;
use App\Models\User;

class UserDeleteMultipleTest extends TestCase
{
    public function test_users_can_delete_multiple_users(): void
    {
        $user = User::factory()->create();
        $response = $this->actingAs($user)->post(
            '/users/destroy-multiple',
            [
                "password" => "password",
                "user_ids" => [1, 2, 3, 4]
            ]
        );

        $response->assertStatus(200);
    }
}