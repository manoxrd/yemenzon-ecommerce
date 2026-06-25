<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class DashboardTest extends TestCase
{
    use RefreshDatabase;

    public function test_guests_are_redirected_to_the_login_page(): void
    {
        $response = $this->get(route('admin.dashboard'));
        $response->assertRedirect(route('login'));
    }

    public function test_non_admin_users_are_redirected_to_the_homepage(): void
    {
        /** @var User $user */
        $user = User::factory()->create();
        $this->actingAs($user);

        $response = $this->get(route('admin.dashboard'));
        $response->assertRedirect(route('home'));
    }

    public function test_admin_users_can_visit_the_dashboard(): void
    {
        /** @var User $user */
        $user = User::factory()->admin()->create();
        $this->actingAs($user);

        $response = $this->get(route('admin.dashboard'));
        $response->assertOk();
    }
}
