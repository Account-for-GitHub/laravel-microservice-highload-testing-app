<?php

namespace Tests\Feature\Http;

use Database\Seeders\HighloadSeeder;
use Database\Seeders\UserSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\User;
use Tests\TestCase;

class ResultsListTest extends TestCase
{
    use RefreshDatabase;

    public function test_results_list_screen_can_be_rendered(): void
    {
        $this->seed([UserSeeder::class, HighloadSeeder::class]);
        $response = $this->get('/results-list/1');
        $response->assertStatus(302);

        $user = User::find(1);
        $response = $this->actingAs($user)->get('/results-list/1');
        $response->assertStatus(200);

        $response->assertSee('Results List');
        $response->assertSee('URL');
        $response->assertSee('Quantity of requests');
        $response->assertSee('Request JSON');
    }
}
