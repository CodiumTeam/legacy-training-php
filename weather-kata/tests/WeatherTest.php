<?php

namespace Tests\Codium\CleanCode;

use Codium\CleanCode\Forecast;
use PHPUnit\Framework\TestCase;

class WeatherTest extends TestCase
{
    // https://www.metaweather.com/api/location/753692/  // Barcelona
    /** @test */
    public function find_the_weather_of_today()
    {
        $forecast = new TestableForecast();

        $prediction = $forecast->predict("Madrid");

        $this->assertEquals("Heavy Cloud", $prediction);
    }
}
