@extends('layouts.master')

@section('content')


    <section class="row new-post">
        <div class="row">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <b>Weather Report for USA</b>
                    <p>Source:Openweathermap.org</p>
                </div>

                <table class="table">
                    <thead>
                        <th>Row Number</th>
                        <th>City Name</th>
                        <th>City Canonical Name</th>
                        <th>Latitude, Longitude</th>
                        <th>Start Time</th>
                        <th>End Time</th>
                        <th>Temperature</th>
                        <th>Pressure</th>
                        <th>Humidity</th>
                        <th>Weather ID</th>

                    </thead>
                    <tbody>
                        @foreach( $datas as $data )
                        <tr>
                            <td>{{ $data['Row_Number'] }}</td>
                            <td>{{ $data['City_Name'] }}</td>
                            <td>{{ $data['City_Canonical_Name']}}</td>
                            <td>{{ $data['Lat_Lon'] }}</td>
                            <td>{{ $data['Start_Time'] }}</td>
                            <td>{{ $data['End_Time'] }}</td>
                            <td>{{ $data['Temperature'] }}</td>
                            <td>{{ $data['Pressure'] }}</td>
                            <td>{{ $data['Humidity'] }}</td>
                            <td>{{ $data['Weather_ID'] }}</td>
                        </tr>
                        @endforeach
                    <tbody>
                </table>
            </div>
        </div>
    </section>

@endsection