<?php

namespace Tests\Feature\WEB\User;

use Tests\TestCase;
use App\Models\User;

class UserDeleteTest extends TestCase
{
    public function test_users_can_delete_users(): void
    {
        $user1 = User::factory()->create();
        $user = User::factory()->create();

        $response = $this->actingAs($user)->delete(
            '/users/' . $user1->id,
            ["password" => "password"]
        );

        $response->assertRedirect(route('users.index'));
    }
}
