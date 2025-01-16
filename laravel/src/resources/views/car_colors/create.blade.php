@extends('layouts.bootstrap')

@section('title', 'Assign Color to Car')

@section('content')
<div class="container">
    <h1>Assign Color to Car</h1>

    <form action="{{ route('car_colors.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="car_id">Select Car</label>
            <select class="form-control" id="car_id" name="car_id" required>
                @foreach($cars as $car)
                <option value="{{ $car->id }}">{{ $car->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="color_id">Select Color</label>
            <select class="form-control" id="color_id" name="color_id" required>
                @foreach($colors as $color)
                <option value="{{ $color->id }}">{{ $color->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="image">Upload Image</label>
            <input type="file" class="form-control" id="image" name="image" accept="image/*" required>
        </div>
        <button type="submit" class="btn btn-primary">Assign Color</button>
    </form>
</div>
@endsection
