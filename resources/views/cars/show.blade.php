@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row mb-3">
        <div class="col-lg-12 margin-tb">
            <div class="d-flex justify-content-between">
                <h2>Show Car</h2>
                <a class="btn btn-primary" href="{{ route('cars.index') }}"> Back</a>
            </div>
        </div>
    </div>

    <div class="row">
        <!-- Center the form and make it responsive -->
        <div class="col-xs-12 col-sm-12 col-md-8 offset-md-2">
            <form action="{{ route('cars.update', $car->id) }}" method="POST">
                @csrf
                @method('PUT')

                <input type="hidden" name="id" value="{{ $car->id }}">

                <div class="form-group">
                    <label for="friend_name"><strong>Friend Name:</strong></label>
                    <input type="text" id="friend_name" name="friend_name" value="{{ $car->friend_name }}" class="form-control">
                </div>

                <div class="form-group">
                    <label for="car_type"><strong>Car Type:</strong></label>
                    <input type="text" id="car_type" name="car_type" value="{{ $car->car_type }}" class="form-control">
                </div>

                <div class="form-group">
                    <label for="car_cost"><strong>Car Cost:</strong></label>
                    <input type="text" id="car_cost" name="car_cost" value="R{{ number_format($car->car_cost, 2, '.', ',') }}" class="form-control">
                </div>

                <div class="form-group">
                    <label for="date_bought"><strong>Date Bought:</strong></label>
                    <input type="date" id="date_bought" name="date_bought" value="{{ $car->date_bought->format('Y-m-d') }}" class="form-control">
                </div>

                <div class="form-group">
                    <strong>Degraded Value:</strong>
                    <p>R{{ $car->degraded_value }}</p>
                </div>

                <!-- Center the button -->
                <div class="form-group text-center">
                    <button type="submit" class="btn btn-primary">Update Car</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
