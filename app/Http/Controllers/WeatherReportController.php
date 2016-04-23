<?php

namespace App\Http\Controllers;

use App\Weather;
use Illuminate\Http\Request;
use App\Http\Requests;

class WeatherReportController extends Controller
{

    /**
     * @var Weather
     */
    protected $weather;

    /**
     * @param Weather $weather
     */
    public function _construct(

        Weather $weather
    ){
        $this->weather = $weather;
    }

    /**
     * Get weather data for country not required for now since we are using api from wunderground
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $datas = $this->getCsvToArray();

        return view('weather', compact('datas'));
    }

    /**
     * Get weather data not required for now since we are using api from wunderground
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getCsvToArray(){

        $header = NULL;
        $weatherData  = array();
        if (($handle = fopen('forecast.csv', 'r')) !== FALSE)
        {
            while (($row = fgetcsv($handle, 1000, ",")) !== FALSE)
            {
                if(!$header)
                    $header = $row;
                else
                    $weatherData[] = array_combine($header, $row);
            }
            fclose($handle);
        }
        return $weatherData;
    }

    /**
     * Go to Search Page
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function flightSearch()
    {
        return view('search');
    }

    /**
     * Predict flight delays for given place and day
     *
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getflightDelay(Request $request)
    {
        $departureState = $request['departure_state'];
        $departureCity  = $request['departure_city'];
        $arrivalState   = $request['arrival_state'];
        $arrivalCity    = $request['arrival_city'];
        $selection      = $request['day'];
//        $arrivalTime    = $request['arrival_time'];
//        $departureTime  = $request['departure_time'];

//        if(isset($arrivalTime) && isset($departureTime))
//        {
//            $departureWeather = $this->getHourlyWeatherForecast($departureState,$departureCity,$selection,$arrivalTime);
//            $arrivalWeather   = $this->getHourlyWeatherForecast($departureState,$departureCity,$selection,$arrivalTime);
//        }

        $departureWeather = $this->weatherForecast($departureState,$departureCity,$selection);
        $arrivalWeather   = $this->weatherForecast($arrivalState,$arrivalCity,$selection);
        if (!empty($departureWeather && $arrivalWeather))
        {
            $departureAnalysed = $this->analyseWeather($departureWeather);
            $arrivalAnalysed   = $this->analyseWeather($arrivalWeather);

            return view('result', compact('departureAnalysed','arrivalAnalysed'));
        }
        else return back()->withError('Sorry, cannot fetch Weather forecast');

    }

    /**
     * Returns weather forecast for selected day
     *
     * @param $state
     * @param $city
     * @param $selection
     * @return mixed
     */
    public function weatherForecast($state, $city, $selection)
    {
        //$state = "AL";$city="Montgomery";$selection="1";
        return $this->weather->getSelectedWeatherForecast($state,$city,$selection);
    }

    /**
     * Returns hourly weather forecast for present day
     *
     * @param $state
     * @param $city
     * @return $this|mixed
     */
    public function getHourlyWeatherForecast($state, $city)
    {
        return $this->weather->getHourlyWeatherForecast($state, $city);
    }

    /**
     * Analyse if weather is suitable for flight
     *
     * @param $weathers
     * @return bool
     */
    public function analyseWeather($weathers)
    {
        $windSpeed = $this->weather->findIfSafeWind($weathers->wind);
        $weather = $this->weather->findIfSafeWeather($weathers->weather);
        $temperature = $this->weather->findIfSafeTemperature($weathers->temperature);
        $visibility = $this->weather->findIfSafeVisibility($weathers->visibility);

        if($windSpeed==true && $weather==true && $temperature ==true && $visibility==true)
        {
            return true;
        }

        return false;
    }

}
