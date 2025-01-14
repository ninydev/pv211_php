@extends('layouts.bootstrap')

@section('title', 'Create Color')

@section('content')
    <div class="container">
        <h1>Create Color</h1>

        <form action="{{ route('colors.store') }}" method="POST"  enctype="multipart/form-data" >
            @csrf
            <div class="form-group">
                <label for="name">Color Name</label>
                <input type="text" class="form-control" id="name" name="name" required>
            </div>
            <div class="form-group">
                <label for="thumb">Color Image</label>
                <input type="file" class="form-control" id="thumb" name="thumb" accept="image/*" required>
            </div>
            <div class="form-group">
                <label for="hex">Color Hex Code</label>
                <input type="color" class="form-control" id="hex" name="hex" required>
            </div>
            <button type="submit" class="btn btn-primary">Create</button>
        </form>
    </div>
@endsection
