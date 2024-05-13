<?php

namespace Tests\Feature\WEB\User;

use Tests\TestCase;
use App\Models\User;

class UserGetMethodTest extends TestCase
{
    /**
     * 
     */
    public function test_authorized_user_index_can_be_rendered(): void
    {
        $user = User::factory()->create();
        $response = $this->actingAs($user)->get('/users');
        $response->assertStatus(200);
    }

    public function test_authorized_user_create_can_be_rendered(): void
    {
        $user = User::factory()->create();
        $response = $this->actingAs($user)->get('/users/create');
        $response->assertStatus(200);
    }

    public function test_authorized_user_delete_multiple_can_be_rendered(): void
    {
        $user = User::factory()->create();
        $response = $this->actingAs($user)->get('/users/delete-multiple');
        $response->assertStatus(200);
    }

    public function test_authorized_user_view_can_be_rendered(): void
    {
        $user = User::factory()->create();
        $response = $this->actingAs($user)->get('/users/' . $user->id);
        $response->assertStatus(200);
    }

    public function test_authorized_user_edit_can_be_rendered(): void
    {
        $user = User::factory()->create();
        $response = $this->actingAs($user)->get('/users/' . $user->id . '/edit');
        $response->assertStatus(200);
    }

    public function test_authorized_user_delete_can_be_rendered(): void
    {
        $user = User::factory()->create();
        $response = $this->actingAs($user)->get('/users/' . $user->id . '/delete');
        $response->assertStatus(200);
    }

}
