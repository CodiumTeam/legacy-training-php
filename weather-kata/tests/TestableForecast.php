<?php

namespace Tests\Codium\CleanCode;

use Codium\CleanCode\Forecast;
use DateTime;

class TestableForecast extends  Forecast
{
    protected function requestWoeid(string $city): string
    {
        return '[{"title":"Madrid","location_type":"City","woeid":766273,"latt_long":"40.420300,-3.705770"}]';
    }

    protected function requestPrediction(mixed $woeid): string
    {
        return '{"consolidated_weather":[{"id":5865151078072320,"weather_state_name":"Heavy Cloud","weather_state_abbr":"hc","wind_direction_compass":"SE","created":"2022-05-12T10:15:56.168945Z","applicable_date":"2022-05-12","min_temp":15.83,"max_temp":26.675,"the_temp":24.575,"wind_speed":4.092736196304251,"wind_direction":133.39604785546265,"air_pressure":1019.0,"humidity":34,"visibility":14.451851189055914,"predictability":71},{"id":6483119562555392,"weather_state_name":"Light Cloud","weather_state_abbr":"lc","wind_direction_compass":"S","created":"2022-05-12T10:15:59.202946Z","applicable_date":"2022-05-13","min_temp":14.620000000000001,"max_temp":29.345,"the_temp":27.45,"wind_speed":3.0900922353058142,"wind_direction":172.58961801928223,"air_pressure":1019.0,"humidity":35,"visibility":14.376354589199076,"predictability":70},{"id":4842464570507264,"weather_state_name":"Light Rain","weather_state_abbr":"lr","wind_direction_compass":"SE","created":"2022-05-12T10:16:02.135318Z","applicable_date":"2022-05-14","min_temp":16.175,"max_temp":28.854999999999997,"the_temp":26.674999999999997,"wind_speed":3.9811800009252636,"wind_direction":142.5635589710663,"air_pressure":1016.5,"humidity":40,"visibility":14.234371271772845,"predictability":75},{"id":5746498076672000,"weather_state_name":"Heavy Cloud","weather_state_abbr":"hc","wind_direction_compass":"SW","created":"2022-05-12T10:16:05.054098Z","applicable_date":"2022-05-15","min_temp":16.17,"max_temp":26.854999999999997,"the_temp":25.71,"wind_speed":6.581631105084971,"wind_direction":224.8376859849125,"air_pressure":1015.0,"humidity":37,"visibility":14.171923466952995,"predictability":71},{"id":6074118886653952,"weather_state_name":"Light Cloud","weather_state_abbr":"lc","wind_direction_compass":"SW","created":"2022-05-12T10:16:08.174404Z","applicable_date":"2022-05-16","min_temp":14.809999999999999,"max_temp":26.805,"the_temp":25.6,"wind_speed":5.895819375540178,"wind_direction":227.33322798267437,"air_pressure":1019.0,"humidity":38,"visibility":14.19615694345025,"predictability":70},{"id":5943131175387136,"weather_state_name":"Clear","weather_state_abbr":"c","wind_direction_compass":"WSW","created":"2022-05-12T10:16:11.240744Z","applicable_date":"2022-05-17","min_temp":14.695,"max_temp":28.9,"the_temp":27.31,"wind_speed":5.680670086693708,"wind_direction":236.5,"air_pressure":1016.0,"humidity":37,"visibility":9.999726596675416,"predictability":68}],"time":"2022-05-12T14:29:59.567172+02:00","sun_rise":"2022-05-12T07:01:36.729801+02:00","sun_set":"2022-05-12T21:21:20.901600+02:00","timezone_name":"LMT","parent":{"title":"Spain","location_type":"Country","woeid":23424950,"latt_long":"39.894890,-2.988310"},"sources":[{"title":"BBC","slug":"bbc","url":"http://www.bbc.co.uk/weather/","crawl_rate":360},{"title":"Forecast.io","slug":"forecast-io","url":"http://forecast.io/","crawl_rate":480},{"title":"HAMweather","slug":"hamweather","url":"http://www.hamweather.com/","crawl_rate":360},{"title":"Met Office","slug":"met-office","url":"http://www.metoffice.gov.uk/","crawl_rate":180},{"title":"OpenWeatherMap","slug":"openweathermap","url":"http://openweathermap.org/","crawl_rate":360},{"title":"Weather Underground","slug":"wunderground","url":"https://www.wunderground.com/?apiref=fc30dc3cd224e19b","crawl_rate":720},{"title":"World Weather Online","slug":"world-weather-online","url":"http://www.worldweatheronline.com/","crawl_rate":360}],"title":"Madrid","location_type":"City","woeid":766273,"latt_long":"40.420300,-3.705770","timezone":"Europe/Madrid"}';
    }

    protected function today(): DateTime
    {
        return new DateTime('2022/05/12');
    }
}
