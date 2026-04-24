<?php

namespace Tests\Feature\Http\Controllers;

use App\Models\User;
use Database\Seeders\HighloadSeeder;
use Database\Seeders\UserSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ResultsControllerTest extends TestCase
{
    use RefreshDatabase;

    public function test_list_session()
    {
        $this->seed([UserSeeder::class, HighloadSeeder::class]);
        $user = User::find(1);
        $response = $this->actingAs($user)->get('/results-list/1');

        $response->assertSessionHas('various-tab', [
            'name' => 'Results List',
            'route' => 'results-list',
            'href' => '/results-list/1',
        ]);
    }

    public function test_aggregate_session()
    {
        $this->seed([UserSeeder::class, HighloadSeeder::class]);
        $user = User::find(1);
        $response = $this->actingAs($user)->get('/aggregate-results/1');

        $response->assertSessionHas('various-tab', [
            'name' => 'Aggregate Results',
            'route' => 'aggregate-results',
            'href' => '/aggregate-results/1',
        ]);
    }
}
