@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row mb-3">
        <div class="col-lg-12 margin-tb">
            <div class="d-flex justify-content-between">
                <h2>Cars in Friend Group</h2>
                <a class="btn btn-success" href="{{ route('cars.create') }}"> Create New Car</a>
            </div>
        </div>
    </div>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <!-- Removed Number Column -->
                <th>Friend Name</th>
                <th>Car Type</th>
                <th>Car Cost</th>
                <th>Date Bought</th>
                <th>Degraded Value</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($cars as $car)
                <tr>
              
                    <td>{{ $car->friend_name }}</td>
                    <td>{{ $car->car_type }}</td>
                    <td>R{{ number_format($car->car_cost, 2) }}</td>
                    <td>{{ $car->date_bought->format('Y-m-d') }}</td>
                    <td>R{{ $car->degraded_value }}</td>
                    <td>
                
                        <a class="btn btn-info" href="{{ route('cars.show', $car->id) }}">Show</a>

                
                        <form action="{{ route('cars.destroy', $car->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this car?');">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <!-- Pagination links -->
    <div class="d-flex justify-content-center">
        {{ $cars->links() }}
    </div>
</div>
@endsection
