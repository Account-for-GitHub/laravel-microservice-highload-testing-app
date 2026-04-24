<?php

namespace Tests\Feature\Http;

use Database\Seeders\UserSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\User;
use Tests\TestCase;

class HighloadsTest extends TestCase
{
    use RefreshDatabase;

    public function test_highloads_screen_can_be_rendered(): void
    {
        $response = $this->get('/highloads');
        $response->assertStatus(302);

        $this->seed(UserSeeder::class);
        $user = User::find(1);
        $response = $this->actingAs($user)->get('/highloads');
        $response->assertStatus(200);
    }
}
