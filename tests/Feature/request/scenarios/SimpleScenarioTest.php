<?php

namespace Tests\Feature\request\scenarios;

use App\Services\Highload\dto\ResponseDTO;
use Database\Seeders\HighloadSeeder;
use Database\Seeders\UserSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Services\Highload\request\scenarios\SimpleScenario;
use Illuminate\Support\Facades\Http;
use Tests\TestCase;

class SimpleScenarioTest extends TestCase
{
    use RefreshDatabase;

    public function test_execute_return_value_is_used()
    {
        $scenario = new SimpleScenario();

        $this->expectExceptionMessage('The return value of method App\Services\Highload\request\scenarios\SimpleScenario::execute() should either be used or intentionally ignored by casting it as (void)');
        $scenario->execute(1);
    }

    public function testExecute()
    {
        $scenario = new SimpleScenario();

        $this->expectExceptionMessage('Highload with ID 1 not found');
        $result = $scenario->execute(1);
    }

    public function test_simple_scenario() {
        $this->seed([UserSeeder::class, HighloadSeeder::class]);

        Http::fake([
            'localhost' => Http::response("{}", 200),
        ]);

        $scenario = new SimpleScenario();

        $result = $scenario->execute(1);

        $this->assertInstanceOf(ResponseDTO::class, $result);
        $this->assertEquals(200, $result->status);
        $this->assertEquals('{}', $result->response);
    }
}
