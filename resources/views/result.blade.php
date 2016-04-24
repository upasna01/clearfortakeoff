@extends('layouts.master')

@section('content')
    @include('errors.errors')

    @if(isset($arrivalWeather) && isset($departureWeather))
        <div class="messageContainer">
                <div class="predictImage">
                    @if($departureAnalysed && $arrivalAnalysed)
                        <img src="/img/happy.png" />

                    @else
                        <img src="/img/sad.png" />
                    @endif
                </div>
                <div class="alertText">
                    @if($departureAnalysed && $arrivalAnalysed)
                      <h2>On Time!</h2>
                    @else
                        <h2>Delayed!</h2>
                    @endif
                </div>
                <div class="detailText">
                    @if($departureAnalysed && $arrivalAnalysed)
                       <p>Hey Good news! Your flight will be on time.</p>
                    @else
                        <p>Sorry! It seems your flight will be delayed.</p>
                    @endif
                </div>
        </div>
    <table class="table table-striped">
        <thead>
            <th>Weather</th>
            <th>Arrival Weather</th>
            <th>Departure Weather</th>
        </thead>
        <tbody>
            <tr>
                <td><p>Location</p></td>
                <td>{{$arrivalState}}, {{$arrivalCity}}</td>
                <td>{{$departureState}}, {{$departureCity}}</td>
            </tr>

            <tr>
                <td><p>Weather Condition</p></td>
                <td>{{$arrivalWeather->conditions}}</td>
                <td>{{$departureWeather->conditions}}</td>
            </tr>
            <tr>
                <td><p>High Temperature</p></td>
                <td>{{$arrivalWeather->high->celsius}} &deg;C</td>
                <td>{{$departureWeather->high->celsius}} &deg;C</td>
            </tr>
            <tr>
                <td><p>Low Temperature</p></td>
                <td>{{$arrivalWeather->low->celsius}} &deg;C</td>
                <td>{{$departureWeather->low->celsius}} &deg;C</td>
            </tr>
            <tr>
                <td><p>Average Humidity</p></td>
                <td>{{$arrivalWeather->avehumidity}}</td>
                <td>{{$departureWeather->avehumidity}}</td>
            </tr>
            <tr>
                <td>Average WindSpeed</td>
                <td>{{$arrivalWeather->avewind->mph}} mph</td>
                <td>{{$departureWeather->avewind->mph}} mph</td>
            </tr>
            <tr>
                <td>Max WindSpeed</td>
                <td>{{$arrivalWeather->maxwind->mph}} mph</td>
                <td>{{$departureWeather->maxwind->mph}} mph</td>
            </tr>

        </tbody>
    </table>
    @else
    <div class="row">
        <div class="alert alert-error">
            <h2>Something went wrong</h2>
        </div>
    </div>
    @endif



@endsection