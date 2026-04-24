<?php

namespace Tests\Feature\Http;

use Database\Seeders\HighloadSeeder;
use Database\Seeders\ResponseSeeder;
use Database\Seeders\UserSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\User;
use Tests\TestCase;

class AggregateResultsTest extends TestCase
{
    use RefreshDatabase;

    public function test_aggregate_results_screen_can_be_rendered(): void
    {
        $this->seed([UserSeeder::class, HighloadSeeder::class, ResponseSeeder::class]);
        $response = $this->get('/aggregate-results/1');
        $response->assertStatus(302);

        $user = User::find(1);
        $response = $this->actingAs($user)->get('/aggregate-results/1');
        $response->assertStatus(200);

        $response->assertSee('Aggregate Results');
        $response->assertSee('Total number of responses');
        $response->assertSee('HTTP status');
        $response->assertSee('Number of responses in group');
    }
}
