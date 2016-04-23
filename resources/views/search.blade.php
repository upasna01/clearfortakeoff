@extends('layouts.master')

@section('content')

    <div class = "row">
        <h3>Predict Your Flight Delays</h3>
        <div class="col-sm-6">
            <form action="{{ route('result') }}" method="post">
                <div class="form-group ">
                    <label for="departure_state">Your Departure State</label>
                    <select class="form-control" name="departure_state">
                        <option value="">Departure State</option>
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
                    <label for="departure_city">Your Departure City</label>
                    <select class="form-control" name="departure_city">
                        <option value="">Departure City</option>
                        <option value="rrna">Ronals Reagan National Airport </option>
                    </select>
                </div>
                <div class=" form-group">
                    <label for="departure_time">Your Departure Time</label>
                    <select class="form-control" name="departure_time">
                        <option value="">Departure Time</option>
                        <option value="6">6 a.m</option>
                    </select>
                </div>

                <div class=" form-group">
                    <label for="arrival_state">Your Arrival State</label>
                    <select class="form-control" name="arrival_state">
                        <option value="">Arrival State</option>
                        <option value="boston">Boston</option>
                    </select>
                </div>

                <div class=" form-group">
                    <label for="arrival_city">Your Arrival City</label>
                    <select class="form-control" name="arrival_city">
                        <option value="">Arrival City</option>
                        <option value="lia">Logan International Airport</option>
                    </select>
                </div>

                <div class=" form-group">
                    <label for="arrival_time">Your Arrival Time</label>
                    <select class="form-control" name="arrival_time">
                        <option value="">Arrival Time</option>
                        <option value="8">8 a.m</option>
                    </select>
                </div>

                <button type="submit" class="btn btn-primary">Submit</button>
                <input type="hidden" name="_token" value="{{ Session::token() }}">

            </form>
        </div>
    </div>
@endsection