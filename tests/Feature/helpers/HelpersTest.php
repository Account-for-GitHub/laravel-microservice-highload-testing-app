<?php

namespace Tests\Feature\helpers;

// use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Services\Highload\helpers\Helpers;
use Tests\TestCase;

class HelpersTest extends TestCase
{

    public function testSetVariousTabSession()
    {
        $this->assertNull(session('various-tab'));

        Helpers::setVariousTabSession(
            'Results List',
            'results-list',
            "/results-list"
        );
        $this->assertNotNull(session('various-tab'));
        $this->assertEquals('Results List', session('various-tab')['name']);
        $this->assertEquals('results-list', session('various-tab')['route']);
        $this->assertEquals('/results-list', session('various-tab')['href']);
    }
}
