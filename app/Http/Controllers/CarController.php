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

}
