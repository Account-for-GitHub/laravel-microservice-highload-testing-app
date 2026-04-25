<?php

namespace Tests\Unit\helpers;

use App\Services\Highload\helpers\Output;
use PHPUnit\Framework\TestCase;

class OutputTest extends TestCase
{
    public function test_output_methods()
    {
        $this->assertNull(Output::getString());

        Output::addString("some string\n");
        $this->assertEquals("some string\n", Output::getString());

        Output::addString("some string 2\n");
        Output::addString("some string 3\n");
        $this->assertEquals("some string\nsome string 2\nsome string 3\n", Output::getString());
    }
}
