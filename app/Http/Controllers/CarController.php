<?php
namespace App\Http\Controllers;

use App\Models\Car;
use Illuminate\Http\Request;

class CarController extends Controller
{
    public function index()
{
    // Paginate the cars, 10 per page
    $cars = Car::paginate(10);
    
    return view('cars.index', compact('cars'));
}

    public function create()
    {
        return view('cars.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'friend_name' => 'required',
            'car_type' => 'required',
            'car_cost' => 'required|numeric',
            'date_bought' => 'required|date',
        ]);

        Car::create($request->all());
        return redirect()->route('cars.index')->with('success', 'Car added successfully.');
    }

    public function show($id)
{
    $car = Car::find($id);
    return view('cars.show', compact('car'));
}

    public function edit(Car $car)
    {
        return view('cars.edit', compact('car'));
    }

    public function update(Request $request, $id)
{
    // Validate the incoming request
    $request->validate([
        'friend_name' => 'required|string|max:255',
        'car_type' => 'required|string|max:255',
        'car_cost' => 'required|string', // Validate as string, will clean and convert
        'date_bought' => 'required|date',
    ]);

    $car = Car::find($id);

    // Sanitize and convert the car_cost
    $carCost = $request->input('car_cost');
    $carCost = str_replace(['R', ',', ' '], '', $carCost); // Remove 'R', commas, and spaces
    $carCost = (float) $carCost; // Convert to float

    // Update the car details
    $car->friend_name = $request->input('friend_name');
    $car->car_type = $request->input('car_type');
    $car->car_cost = $carCost;
    $car->date_bought = $request->input('date_bought');

    $car->save();

    return redirect()->route('cars.show', $car->id)
                     ->with('success', 'Car updated successfully');
}

}
