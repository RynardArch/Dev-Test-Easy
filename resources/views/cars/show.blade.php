@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Car Details</h1>
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Friend Name: {{ $car->friend_name }}</h5>
            <p class="card-text">Car Type: {{ $car->car_type }}</p>
            <p class="card-text">Car Cost: ${{ number_format($car->car_cost, 2) }}</p>
            <p class="card-text">Date Bought: {{ $car->date_bought->format('Y-m-d') }}</p>
            <p class="card-text">Degraded Value: ${{ number_format($car->car_cost * pow(0.85, now()->year - $car->date_bought->year), 2) }}</p>
            <a href="{{ route('cars.index') }}" class="btn btn-primary">Back</a>
        </div>
    </div>
</div>
@endsection
