@extends('layouts.master')

@section('content')

    <div class = "row">
        <h3>Predict Your Flight Delays</h3>
        <div class="col-sm-6">
            <form action="{{ route('result') }}" method="post">
                <div class="form-group ">
                    <label for="departure_city">Your Departure City</label>
                    <select class="form-control" name="departure_city">
                        <option value="">Departure City</option>
                        <option value="virgina"> Virginia Square, Arlington, Virginia </option>
                    </select>
                </div>

                <div class=" form-group">
                    <label for="departure_airport">Your Departure Airport</label>
                    <select class="form-control" name="departure_airport">
                        <option value="">Departure Airport</option>
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
                    <label for="arrival_city">Your Arrival City</label>
                    <select class="form-control" name="arrival_city">
                        <option value="">Arrival City</option>
                        <option value="">Boston</option>
                    </select>
                </div>

                <div class=" form-group">
                    <label for="arrival_airport">Your Arrival Airport</label>
                    <select class="form-control" name="arrival_airport">
                        <option value="">Arrival Airport</option>
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