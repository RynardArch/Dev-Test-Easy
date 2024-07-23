@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row mb-3">
        <div class="col-lg-12 margin-tb">
            <div class="d-flex justify-content-between">
                <h2>Edit Car</h2>
                <a class="btn btn-primary" href="{{ route('cars.index') }}"> Back</a>
            </div>
        </div>
    </div>

    <div class="row justify-content-center">
        <div class="col-xs-12 col-sm-12 col-md-8">
            <form action="{{ route('cars.update', $car->id) }}" method="POST">
                @csrf
                @method('PUT')

                <input type="hidden" name="id" value="{{ $car->id }}">

                <div class="form-group">
                    <label for="friend_name"><strong>Friend Name:</strong></label>
                    <input type="text" id="friend_name" name="friend_name" value="{{ old('friend_name', $car->friend_name) }}" class="form-control">
                </div>

                <div class="form-group">
                    <label for="car_type"><strong>Car Type:</strong></label>
                    <input type="text" id="car_type" name="car_type" value="{{ old('car_type', $car->car_type) }}" class="form-control">
                </div>

                <div class="form-group">
                    <label for="car_cost"><strong>Car Cost:</strong></label>
                    <input type="number" id="car_cost" name="car_cost" step="0.01" value="{{ old('car_cost', $car->car_cost) }}" class="form-control">
                </div>

                <div class="form-group">
                    <label for="date_bought"><strong>Date Bought:</strong></label>
                    <input type="date" id="date_bought" name="date_bought" value="{{ old('date_bought', $car->date_bought->format('Y-m-d')) }}" class="form-control">
                </div>

                <div class="form-group text-center">
                    <button type="submit" class="btn btn-primary">Update Car</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
