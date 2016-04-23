<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class WeatherReportController extends Controller
{

    /**
     * Get weather data for country
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $datas = $this->getCsvToArray();

        return view('weather', compact('datas'));
    }


    /**
     * Get weather data
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
     * Go to Search Page for flight details
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function flightSearch()
    {
        return view('search');
    }

    /**
     * Predict flight delays for given place and time
     *
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function flightResult(Request $request)
    {
        $DepartureCity = $request['departure_city'];
        $DepartureAirport = $request['departure_airport'];
        $DepartureTime = $request['departure_time'];
        $ArrivalCity = $request['arrival_city'];
        $ArrivalAirport = $request['arrival_airport'];
        $ArrivalTime = $request['arrival_time'];

        dd($ArrivalAirport, $DepartureCity, $DepartureAirport, $DepartureTime, $ArrivalCity, $ArrivalTime );
        return view('result');
    }




}
