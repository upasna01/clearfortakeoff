<?php namespace App;

use Mockery\CountValidator\Exception;


/**
 * Class Weather
 * @package App
 */
class Weather
{
    /** Get Weather forecast of four days
     *
     * @param $state
     * @param $city
     * @return mixed
     */
    public function getSelectedWeatherForecast($state, $city, $selection)
    {
        try {
            $json_string = file_get_contents(
                sprintf("http://api.wunderground.com/api/ee166ad90617bbb5/forecast/q/US/%s/%s.json", $state, $city)
            );
            $parsed_json = json_decode($json_string);

            $fourDaysForecast = $this->getWeatherForecast($state, $city);
            $nextDayForecast  = $fourDaysForecast->forecast->simpleforecast->forecastday[$selection];

            return $nextDayForecast;
        } catch (Exception $exception) {
            return redirect()->back()->withErrors('Sorry cannot fetch weather forecast');
        }

    }

<<<<<<< HEAD
    /**
     * Get weatehr foreecast for today
     *
     * @param $state
     * @param $city
     * @param $hour
     * @return $this|mixed
     */
    public function getHourlyWeatherForecast($state, $city, $hour)
=======
    public function getHourlyWeatherForecast($state, $city)
>>>>>>> 9f9c6520e9db61d79f50fda540b9b57c9f3f55bc
    {
        try {
            $json_string = file_get_contents(
                sprintf("http://api.wunderground.com/api/ee166ad90617bbb5/hourly/q/%s/%s.json", $state, $city)
            );
            $parsed_json = json_decode($json_string);

            return $parsed_json;
        } catch (Exception $exception) {
            return redirect()->back()->withErrors('Sorry cannot fetch weather forecast');
        }
    }
}
