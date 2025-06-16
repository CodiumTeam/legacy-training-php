<?php

namespace Tests\Codium\CleanCode;

use PHPUnit\Framework\Attributes\CoversNamespace;
use PHPUnit\Framework\TestCase;

#[CoversNamespace("Codium\CleanCode")]
class WeatherTest extends TestCase
{
    public function test_find_the_weather_of_today()
    {
        $this->assertEquals(true, true);
    }
}
