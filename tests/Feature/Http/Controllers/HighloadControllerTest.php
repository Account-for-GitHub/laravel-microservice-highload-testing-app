<?php

namespace Tests\Feature\Http\Controllers;

use App\Models\User;
use Database\Seeders\UserSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class HighloadControllerTest extends TestCase
{
    use RefreshDatabase;

    public function testCreate()
    {
        $this->seed(UserSeeder::class);
        $user = User::find(1);
        $response = $this->actingAs($user)->post('/highload', [
            'url' => 'http://localhost',
            'quantity' => '3',
            'request' => '{}',
        ]);

        $response->assertRedirect('/highload-progress');
        $this->assertDatabaseCount('highloads', 1);
    }

    public function testList()
    {
        $this->seed(UserSeeder::class);
        $user = User::find(1);
        $response = $this->actingAs($user)->get('/highloads');

        $response->assertStatus(200);
        $response->assertSee('No highloads here yet, go to dashboard and perform one!');
    }
}
