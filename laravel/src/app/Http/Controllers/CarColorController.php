<?php

namespace App\Http\Controllers;

use App\Models\CarColorModel;
use App\Models\CarModel;
use App\Models\ColorModel;
use Illuminate\Http\Request;

class CarColorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('car_colors.create', [
            'cars' => CarModel::all(),
            'colors' => ColorModel::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'car_id' => 'required|exists:cars,id',
            'color_id' => 'required|exists:colors,id',
            'image' => 'required|image|mimes:jpeg,webp,png,jpg,gif,svg|max:2048',
        ]);

//        $imageName = time() . '.' . $request->image->extension();
//        $request->image->move(public_path('images'), $imageName);

        if ($request->hasFile('image')) {
            $imageUrl = $request->file('image')
                ->store('car_colors/' . date('Y/F'), 'public');
        }

        CarColorModel::create([
            'car_id' => $request->car_id,
            'color_id' => $request->color_id,
            'url' => $imageUrl,
        ]);

        return redirect()->route('car_colors.index')->with('success', 'Color assigned to car successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
