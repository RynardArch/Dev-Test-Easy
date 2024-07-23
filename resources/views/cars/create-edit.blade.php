@extends('layouts.app')

@section('content')
<div class="container">
    <h1>{{ isset($car) ? 'Edit Car' : 'Add Car' }}</h1>
    <form action="{{ isset($car) ? route('cars.update', $car->id) : route('cars.store') }}" method="POST">
        @csrf
        @if(isset($car))
            @method('PUT')
        @endif
        <div class="form-group">
            <label for="friend_name">Friend Name</label>
            <input type="text" class="form-control" id="friend_name" name="friend_name" value="{{ old('friend_name', $car->friend_name ?? '') }}">
        </div>
        <div class="form-group">
            <label for="car_type">Car Type</label>
            <input type="text" class="form-control" id="car_type" name="car_type" value="{{ old('car_type', $car->car_type ?? '') }}">
        </div>
        <div class="form-group">
            <label for="car_cost">Car Cost</label>
            <input type="number" class="form-control" id="car_cost" name="car_cost" step="0.01" value="{{ old('car_cost', $car->car_cost ?? '') }}">
        </div>
        <div class="form-group">
            <label for="date_bought">Date Bought</label>
            <input type="date" class="form-control" id="date_bought" name="date_bought" value="{{ old('date_bought', isset($car) ? $car->date_bought->format('Y-m-d') : '') }}">
        </div>
        <button type="submit" class="btn btn-success">{{ isset($car) ? 'Update' : 'Add' }}</button>
    </form>
</div>
@endsection
