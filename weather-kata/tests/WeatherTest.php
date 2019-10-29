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
        $this->assertTrue(true, 'I don\'t know how to test it');
    }

}