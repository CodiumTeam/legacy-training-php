<?php

namespace Codium\CleanCode;

use DateTime;
use GuzzleHttp\Client;

class Forecast
{
    public function predict(string $city, DateTime $datetime = null, bool $wind = false): string
    {
        // When date is not provided we look for the current prediction
        if (!$datetime) {
            $datetime = $this->today();
        }

        // If there are predictions
        if ($datetime < new DateTime("+6 days 00:00:00")) {


            // Create a Guzzle Http Client
            $contents = $this->requestWoeid($city);
            $woeid = json_decode($contents,true)[0]['woeid'];

            // Find the predictions for the city
            $results = json_decode($this->requestPrediction($woeid),true)['consolidated_weather'];
            foreach ($results as $result) {

                // When the date is the expected
                if ($result["applicable_date"] == $datetime->format('Y-m-d')) {
                    // If we have to return the wind information
                    if ($wind) {
                        return $result['wind_speed'];
                    } else {
                        return $result['weather_state_name'];
                    }
                }
            }
        } else {
            return "";
        }
    }/**
 * @param string $city
 * @return array
 * @throws \GuzzleHttp\Exception\GuzzleException
 */
    protected function requestWoeid(string $city): string
    {
        $client = new Client();

        // Find the id of the city on metawheather
        $contents = $client->get("https://www.metaweather.com/api/location/search/?query=$city")->getBody()->getContents();

        return $contents;
    }

    /**
     * @param Client $client
     * @param mixed $woeid
     * @return string
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    protected function requestPrediction(mixed $woeid): string
    {
        $client = new Client();
        return $client->get("https://www.metaweather.com/api/location/$woeid")->getBody()->getContents();
    }

    /**
     * @return DateTime
     */
    protected function today(): DateTime
    {
        return new DateTime();
    }
}
