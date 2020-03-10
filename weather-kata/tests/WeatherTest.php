<?php

namespace Tests\Codium\CleanCode;

use PHPUnit\Framework\TestCase;

class WeatherTest extends TestCase
{
    // https://www.metaweather.com/api/location/753692/  // Barcelona
    /** @test */
    public function find_the_weather_of_today()
    {
        $this->assertEquals(true, true);
    }
}
