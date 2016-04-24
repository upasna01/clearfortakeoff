@extends('layouts.master')

@section('content')

    @include('errors.errors')
    <div class = "row">
        <h3>Predict Your Flight Delays</h3>
        <div class="col-sm-6">
            <form action="{{ route('result') }}" method="post">
                <div class="form-group">
                    <select class="form-control" name="day">
                        <option value="">Select Day</option>
                        <option value="0">Today</option>
                        <option value="1">Tomorrow</option>
                        <option value="2">The Day After Tomorrow</option>
                        <option value="3">The Next Day </option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="departure_state">Your Departure State</label>
                    <select class="form-control" name="departure_state">
                        <option value="">Departure State</option>
                        <option value="AL" name="Al">Alabama </option>
                        <option value="AK" name="AK">Alaska</option>
                        <option value="AZ" name="AZ">Arizona </option>
                        <option value="AR" name="AR">Arkansas </option>
                        <option value="CA" name="CA">California </option>
                        <option value="RI">Rhode Island</option>
                        <option value="SC">South Carolina</option>
                        <option value="SD">South Dakota</option>
                        <option value="CO">Colorado </option>
                        <option value="CT">Connecticut </option>
                        <option value="DE">Delaware </option>
                        <option value="FL">Florida </option>
                        <option value="GA">Georgia </option>
                        <option value="HI">Hawaii </option>
                        <option value="ID">Idaho </option>
                        <option value="IL">Illinois</option>
                        <option value="IN">Indiana</option>
                        <option value="IA">Iowa</option>
                        <option value="KS">Kansas</option>
                        <option value="KY">Kentucky</option>
                        <option value="LA">Louisiana</option>
                        <option value="ME">Maine</option>
                        <option value="MD">Maryland</option>
                        <option value="MA">Massachusetts</option>
                        <option value="MI">Michigan</option>
                        <option value="MN">Minnesota</option>
                        <option value="MS">Mississippi</option>
                        <option value="MO">Missouri</option>
                        <option value="MT">Montana</option>
                        <option value="NE">Nebraska</option>
                        <option value="NV">Nevada</option>
                        <option value="NH">New Hampshire</option>
                        <option value="NJ">New Jersey</option>
                        <option value="NM">New Mexico</option>
                        <option value="NY">New York</option>
                        <option value="NC">North Carolina</option>
                        <option value="ND">North Dakota</option>
                        <option value="OH">Ohio</option>
                        <option value="OK">Oklahoma</option>
                        <option value="OR">Oregon</option>
                        <option value="PA">Pennsylvania</option>
                        <option value="TN">Tennessee</option>
                        <option value="TX">Texas</option>
                        <option value="UT">Utah</option>
                        <option value="VT">Vermont</option>
                        <option value="VA">Virginia</option>
                        <option value="WA">Washington</option>
                        <option value="WV">West Virginia</option>
                        <option value="WI">Wisconsin</option>
                        <option value="WY">Wyoming</option>
                    </select>
                </div>

                <div class=" form-group">
                    <label for="departure_city">Your Departure City</label>
                    <select class="form-control" name="departure_city">
                        <option value="">Departure City</option>
                        <option value="Montgomery">Montgomery</option>
                        <option value="Juneau">Juneau</option>
                        <option value="Phoenix">Phoenix</option>
                        <option value="Little_Rock">Little Rock</option>
                        <option value="Sacramento">Sacramento</option>
                        <option value="Denver">Denver</option>
                        <option value="Hartford">Hartford</option>
                        <option value="Dover">Dover</option>
                        <option value="Tallahassee">Tallahassee</option>
                        <option value="Atlanta">Atlanta</option>
                        <option value="Honolulu">Honolulu</option>
                        <option value="Boise">Boise</option>
                        <option value="Springfield">Springfield</option>
                        <option value="Indianapolis">Indianapolis</option>
                        <option value="Des_Moines">Des Moines</option>
                        <option value="Topeka">Topeka</option>
                        <option value="Frankfort">Frankfort</option>
                        <option value="Baton_Rouge">Baton Rouge</option>
                        <option value="Augusta">Augusta</option>
                        <option value="Annapolis">Annapolis</option>
                        <option value="Boston">Boston</option>
                        <option value="Lansing">Lansing</option>
                        <option value="St. Paul">St. Paul</option>
                        <option value="Jackson">Jackson</option>
                        <option value="Jefferson_City">Jefferson City</option>
                        <option value="Helena">Helena</option>
                        <option value="Lincoln">Lincoln</option>
                        <option value="Carson_City">Carson City</option>
                        <option value="Concord">Concord</option>
                        <option value="Trenton">Trenton</option>
                        <option value="Santa_Fe">Santa Fe</option>
                        <option value="Albany">Albany</option>
                        <option value="Raleigh">Raleigh</option>
                        <option value="Bismarck">Bismarck</option>
                        <option value="Columbus">Columbus</option>
                        <option value="Oklahoma_City">Oklahoma City</option>
                        <option value="Salem">Salem</option>
                        <option value="Harrisburg">Harrisburg</option>
                        <option value="Providence">Providence</option>
                        <option value="Columbia">Columbia</option>
                        <option value="Pierre">Pierre</option>
                        <option value="Nashville">Nashville</option>
                        <option value="Austin">Austin</option>
                        <option value="Salt_Lake_City">Salt Lake City</option>
                        <option value="Montpelier">Montpelier</option>
                        <option value="Richmond">Richmond</option>
                        <option value="Olympia">Olympia</option>
                        <option value="Charleston">Charleston</option>
                        <option value="Madison">Madison</option>
                        <option value="Cheyenne">Cheyenne</option>
                    </select>
                </div>
                {{--<div class=" form-group" name="time">--}}
                    {{--<label for="departure_time">Your Departure Time</label>--}}
                    {{--<select class="form-control" name="departure_time">--}}
                        {{--<option value="">Departure Time</option>--}}
                        {{--<option value="am"> A.M</option>--}}
                        {{--<option value="pm"> P.M</option>--}}
                    {{--</select>--}}
                {{--</div>--}}

                <div class=" form-group">
                    <label for="arrival_state">Your Arrival State</label>
                    <select class="form-control" name="arrival_state">
                        <option value="">Arrival State</option>
                        <option value="AL">Alabama </option>
                        <option value="AK">Alaska</option>
                        <option value="AZ">Arizona </option>
                        <option value="AR">Arkansas </option>
                        <option value="CA">California </option>
                        <option value="CO">Colorado </option>
                        <option value="CT">Connecticut </option>
                        <option value="DE">Delaware </option>
                        <option value="FL">Florida </option>
                        <option value="GA">Georgia </option>
                        <option value="HI">Hawaii </option>
                        <option value="ID">Idaho </option>
                        <option value="IL">Illinois</option>
                        <option value="IN">Indiana</option>
                        <option value="IA">Iowa</option>
                        <option value="KS">Kansas</option>
                        <option value="KY">Kentucky</option>
                        <option value="LA">Louisiana</option>
                        <option value="ME">Maine</option>
                        <option value="MD">Maryland</option>
                        <option value="MA">Massachusetts</option>
                        <option value="MI">Michigan</option>
                        <option value="MN">Minnesota</option>
                        <option value="MS">Mississippi</option>
                        <option value="MO">Missouri</option>
                        <option value="MT">Montana</option>
                        <option value="NE">Nebraska</option>
                        <option value="NV">Nevada</option>
                        <option value="NH">New Hampshire</option>
                        <option value="NJ">New Jersey</option>
                        <option value="NM">New Mexico</option>
                        <option value="NY">New York</option>
                        <option value="NC">North Carolina</option>
                        <option value="ND">North Dakota</option>
                        <option value="OH">Ohio</option>
                        <option value="OK">Oklahoma</option>
                        <option value="OR">Oregon</option>
                        <option value="PA">Pennsylvania</option>
                        <option value="RI">Rhode Island</option>
                        <option value="SC">South Carolina</option>
                        <option value="SD">South Dakota</option>
                        <option value="TN">Tennessee</option>
                        <option value="TX">Texas</option>
                        <option value="UT">Utah</option>
                        <option value="VT">Vermont</option>
                        <option value="VA">Virginia</option>
                        <option value="WA">Washington</option>
                        <option value="WV">West Virginia</option>
                        <option value="WI">Wisconsin</option>
                        <option value="WY">Wyoming</option>
                    </select>
                </div>

                <div class=" form-group">
                    <label for="arrival_city">Your Arrival City</label>
                    <select class="form-control" name="arrival_city">
                        <option value="">Arrival City</option>
                        <option value="Montgomery">Montgomery</option>
                        <option value="Juneau">Juneau</option>
                        <option value="Phoenix">Phoenix</option>
                        <option value="Little_Rock">Little Rock</option>
                        <option value="Sacramento">Sacramento</option>
                        <option value="Denver">Denver</option>
                        <option value="Hartford">Hartford</option>
                        <option value="Dover">Dover</option>
                        <option value="Tallahassee">Tallahassee</option>
                        <option value="Atlanta">Atlanta</option>
                        <option value="Honolulu">Honolulu</option>
                        <option value="Boise">Boise</option>
                        <option value="Springfield">Springfield</option>
                        <option value="Indianapolis">Indianapolis</option>
                        <option value="Des_Moines">Des Moines</option>
                        <option value="Topeka">Topeka</option>
                        <option value="Frankfort">Frankfort</option>
                        <option value="Baton_Rouge">Baton Rouge</option>
                        <option value="Augusta">Augusta</option>
                        <option value="Annapolis">Annapolis</option>
                        <option value="Boston">Boston</option>
                        <option value="Lansing">Lansing</option>
                        <option value="St. Paul">St. Paul</option>
                        <option value="Jackson">Jackson</option>
                        <option value="Jefferson_City">Jefferson City</option>
                        <option value="Helena">Helena</option>
                        <option value="Lincoln">Lincoln</option>
                        <option value="Carson_City">Carson City</option>
                        <option value="Concord">Concord</option>
                        <option value="Trenton">Trenton</option>
                        <option value="Santa_Fe">Santa Fe</option>
                        <option value="Albany">Albany</option>
                        <option value="Raleigh">Raleigh</option>
                        <option value="Bismarck">Bismarck</option>
                        <option value="Columbus">Columbus</option>
                        <option value="Oklahoma_City">Oklahoma City</option>
                        <option value="Salem">Salem</option>
                        <option value="Harrisburg">Harrisburg</option>
                        <option value="Providence">Providence</option>
                        <option value="Columbia">Columbia</option>
                        <option value="Pierre">Pierre</option>
                        <option value="Nashville">Nashville</option>
                        <option value="Austin">Austin</option>
                        <option value="Salt_Lake_City">Salt Lake City</option>
                        <option value="Montpelier">Montpelier</option>
                        <option value="Richmond">Richmond</option>
                        <option value="Olympia">Olympia</option>
                        <option value="Charleston">Charleston</option>
                        <option value="Madison">Madison</option>
                        <option value="Cheyenne">Cheyenne</option>
{{----}}
                    </select>
                </div>

                {{--<div class=" form-group" name="time">--}}
                    {{--<label for="arrival_time">Your Arrival Time</label>--}}
                    {{--<select class="form-control" name="arrival_time">--}}
                        {{--<option value="">Arrival Time</option>--}}
                        {{--<option value="am"> A.M</option>--}}
                        {{--<option value="pm"> P.M</option>--}}
                    {{--</select>--}}
                {{--</div>--}}

                <button type="submit" class="btn btn-primary">Submit</button>
                <input type="hidden" name="_token" value="{{ Session::token() }}">

            </form>
        </div>
    </div>
@endsection