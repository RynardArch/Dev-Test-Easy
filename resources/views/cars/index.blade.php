@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Cars in Friend Group</h1>
    <a href="{{ route('cars.create') }}" class="btn btn-primary mb-3">Add Car</a>
    <table class="table">
        <thead>
            <tr>
                <th>Friend Name</th>
                <th>Car Type</th>
                <th>Car Cost</th>
                <th>Date Bought</th>
                <th>Degraded Value</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($cars as $car)
            <tr>
                <td>{{ $car->friend_name }}</td>
                <td>{{ $car->car_type }}</td>
                <td>${{ number_format($car->car_cost, 2) }}</td>
                <td>{{ $car->date_bought->format('Y-m-d') }}</td>
                <td>${{ number_format($car->car_cost * pow(0.85, now()->year - $car->date_bought->year), 2) }}</td>
                <td>
                    <a href="{{ route('cars.edit', $car->id) }}" class="btn btn-warning">Edit</a>
                    <form action="{{ route('cars.destroy', $car->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
