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


    /**
     * Get weather foreecast for today
     *
     * @param $state
     * @param $city
     * @param $hour
     * @return $this|mixed
     */

    public function getHourlyWeatherForecast($state, $city)

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

    /**
     * Get if speed of wind is in safe range
     *
     * @param $windSpeed
     * @return bool
     */
    public function findIfSafeWind($windSpeed)
    {
        $lowerRange = '0';
        $upperRange = '24';
        if (($lowerRange < $windSpeed) && ($windSpeed <= $upperRange)){

            return true;
        }
        return false;
    }

    /**
     * Get if safe range of viibility exits
     *
     * @param $visiblity
     * @return bool
     */
    public function findIfSafeVisibility($visiblity)
    {
        $visible = 1;
        if( $visible <= $visiblity){

            return true;
        }
        return false;

    }

    /**
     * Get if the temperature lies in safe range
     *
     * @param $temperature
     * @return bool
     */
    public function findIfSafeTemperature($temperature)
    {
        $lowerRange = '0';
        $upperRange = '24';
        if (($lowerRange < $temperature) && ($temperature <= $upperRange)){

            return true;
        }
        return false;
    }

    public function findIfSafeWeather($weather)
    {

    }

}
