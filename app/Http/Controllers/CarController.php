<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Car;
use App\Events\UserLog;
use App\Listeners\LogListener;

class CarController extends Controller
{
    public function index()
    {
        $cars = Car::all();
        return view('cars.index', compact('cars'));
    }

    public function create()
    {
        return view('cars.create');
    }

    public function store(Request $request)
    {
        // Validate the request data
        $request->validate([
            'name' => 'required',
            'model' => 'required',
            'description' => 'required',
            'release_date' => 'required|date',
        ]);

        // Create a new car record
        $car = Car::create($request->all()); // Create the car and get the instance

        $log_entry = Auth::user()->name . " added a car " . $car->name;
        event(new UserLog($log_entry)); // Use 'UserLog' instead of 'UserLog'

        return redirect()->route('cars.index')
            ->with('success', 'Car created successfully');
    }

    public function edit(Car $car)
    {
        return view('cars.edit', compact('car'));
    }

    public function update(Request $request, Car $car)
{
    // Validate the request data
    $request->validate([
        'name' => 'required',
        'model' => 'required',
        'description' => 'required',
        'release_date' => 'required|date',
    ]);

    // Update the car record
    $car->update($request->all());

    $log_entry = Auth::user()->name . " updated a car " . $car->name;
    event(new UserLog($log_entry));

    return redirect()->route('cars.index')
        ->with('success', 'Car updated successfully');
}

public function destroy(Car $car)
{
    $carName = $car->name; // Get the car name before deleting

    // Delete the car record
    $car->delete();

    $log_entry = Auth::user()->name . " deleted a car " . $carName;
    event(new UserLog($log_entry));

    return redirect()->route('cars.index')
        ->with('success', 'Car deleted successfully');
}

}
