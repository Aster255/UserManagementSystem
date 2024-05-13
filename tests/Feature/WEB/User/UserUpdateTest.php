<?php

namespace Tests\Feature\WEB\User;

use Tests\TestCase;
use App\Models\User;

class UserUpdateTest extends TestCase
{
    public function test_users_can_update_users(): void
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)->patch('/users/' . $user->id, [
            'first_name' => "Paul",
        ]);

        $response->assertRedirect(route('users.show', $user->id));
        $newUser = User::where('email', $user->email)->first();
        $this->assertEquals('Paul', $newUser->first_name);
    }
}
