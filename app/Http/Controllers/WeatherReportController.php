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
     * WeatherReportController constructor.
     * @param Weather $weather
     */
    public function __construct(Weather $weather)
    {
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
    public function getCsvToArray()
    {

        $header      = null;
        $weatherData = [];
        if (($handle = fopen('forecast.csv', 'r')) !== false) {
            while (($row = fgetcsv($handle, 1000, ",")) !== false) {
                if (!$header) {
                    $header = $row;
                } else {
                    $weatherData[] = array_combine($header, $row);
                }
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
        $rules     = [
            'day'             => 'required',
            'departure_state' => 'required',
            'departure_city'  => 'required',
            'arrival_state'   => 'required',
            'arrival_city'    => 'required'
        ];

        $messages = [
            'day.required' => 'Please select day',
            'departure_state.required' => 'Please select departure state',
            'departure_city.required' => 'Please select departure city',
            'arrival_state.required' => 'Please select arrival state',
            'arrival_city.required' => 'Please select arrival city',
        ];

        $this->validate($request,$rules,$messages);

        $departureState = $request['departure_state'];
        $departureCity  = $request['departure_city'];
        $arrivalState   = $request['arrival_state'];
        $arrivalCity    = $request['arrival_city'];
        $selection      = $request['day'];

        $departureWeather = $this->weatherForecast($departureState, $departureCity, $selection);
        $arrivalWeather   = $this->weatherForecast($arrivalState, $arrivalCity, $selection);

        if (!empty($departureWeather && $arrivalWeather)) {
            $departureAnalysed = $this->analyseWeather($departureWeather);
            $arrivalAnalysed   = $this->analyseWeather($arrivalWeather);

            return view('result', compact('departureState', 'departureCity', 'arrivalState', 'arrivalCity', 'departureWeather', 'arrivalWeather', 'departureAnalysed', 'arrivalAnalysed'));
        } else {
            return back()->withError('Sorry, cannot fetch Weather forecast');
        }

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
        return $this->weather->getSelectedWeatherForecast($state, $city, $selection);
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
        $windSpeed        = $this->weather->findIfSafeWind($weathers->maxwind->mph, $weathers->avewind->mph);
        $weather          = $this->weather->findIfSafeWeather($weathers);
        $temperatureRange = $this->weather->findIfSafeTemperature($weathers->high->celsius, $weathers->low->celsius);
        $humidity         = $this->weather->findIfSafeHumidity($weathers->avehumidity);

        if ($windSpeed == true && $weather == true && $temperatureRange == true && $humidity == true) {
            return true;
        }

        return false;
    }

}
