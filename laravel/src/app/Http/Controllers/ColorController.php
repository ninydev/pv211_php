<?php

namespace App\Http\Controllers;

use App\Http\Requests\Colors\CreateColorRequest;
use App\Models\ColorModel;

class ColorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // dd(ColorModel::all());

        $colors = ColorModel::paginate(10); // Adjust the number of items per page as needed
        return view('colors.index', compact('colors'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('colors.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateColorRequest $request)
    {
        $data = $request->validated();

        if ($request->hasFile('thumb')) {
            $data['url'] = $request->file('thumb')
                ->store('colors/' . date('Y/F'), 'public');
//            $data['url'] = $request->file('thumb')
//                ->store('thumbs/' . date('Y/F'), 'azure');
        }
        ColorModel::create($data);
        return redirect()->route('colors.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(int $id)
    {
        $color = ColorModel::findOrFail($id);
        return view('colors.show', compact('color'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(int $id)
    {
        return view('colors.edit', ['color' => ColorModel::findOrFail($id)]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CreateColorRequest $request, int $id)
    {
        $color = ColorModel::findOrFail($id);
        $color->update($request->validated());
        return redirect()->route('colors.index')->with('success', 'Color updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id)
    {
        $color = ColorModel::findOrFail($id);
        $color->delete();
        return redirect()->route('colors.index')->with('success', 'Color deleted successfully.');
    }
}
