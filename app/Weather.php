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

            $json_string     = file_get_contents(
                sprintf("http://api.wunderground.com/api/ee166ad90617bbb5/forecast/q/US/%s/%s.json", $state, $city)
            );
            $parsed_json = json_decode($json_string);

            $nextDayForecast  = $parsed_json ->forecast->simpleforecast->forecastday[$selection];

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
     * Find the safe range for wind
     *
     * @param $maxSpeed
     * @param $avgSpeed
     * @return bool
     */
    public function findIfSafeWind($maxSpeed, $avgSpeed)
    {
        $lowerRange = '0';
        $upperRange = '24';

        if (($avgSpeed > $lowerRange  ) && ($maxSpeed <= $upperRange)){

            return true;
        }

        return false;
    }

    /**
     * Get if safe range of humidity exits
     *
     * @param $avghumidity
     * @return bool
     */
    public function findIfSafeHumidity($avghumidity)
    {
        $low = '40';
        $high = '70';
        if(($avghumidity > $low) && ($avghumidity < $high)){

            return true;
        }

        return false;
    }

    /**
     * Get if the temperature lies in safe range
     *
     * @param $low,$high
     * @return bool
     */
    public function findIfSafeTemperature($low,$high)
    {
        $lowerRange = '10';
        $upperRange = '35';
        if (($low > $lowerRange) && ($high < $upperRange)){

            return true;
        }

        return false;
    }

    /**
     * Find if the weather is clear for takeoff
     *
     * @param $weather
     * @return bool
     */
    public function findIfSafeWeather($weather)
    {
        $condition  = $weather->conditions;
        $snowAllDay = $weather->snow_allday->in;
        $snowDay    = $weather->snow_day->in;

        if(($condition == 'Clear') && ($snowAllDay == '0') &&($snowDay== '0')){

            return true;
        }
        return false;

    }

}
