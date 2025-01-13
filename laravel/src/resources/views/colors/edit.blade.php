@extends('layouts.bootstrap')

@section('title', 'Edit Color')

@section('content')
    <div class="container">
        <h1>Edit Color</h1>
        <form action="{{ route('colors.update', $color->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="name">Color Name</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ $color->name }}" required>
            </div>
            <div class="form-group">
                <label for="hex">Color Hex Code</label>
                <input type="color" class="form-control" id="hex" name="hex" value="{{ $color->hex }}" required>
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
@endsection
