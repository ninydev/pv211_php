<?php

namespace App\Http\Controllers;

use App\Models\CarModel;
use App\Models\ColorModel;
use Illuminate\Http\Request;

class VariableController extends Controller
{
    public function __invoke(Request $request)
    {
        $cars = CarModel::all();
        $colors = ColorModel::all();

        $all = CarModel::with('colors.color')->get();

        return view('cars.variable', [
            'cars' => $cars,
            'colors' => $colors,
            'all' => $all
        ]);
    }
}
