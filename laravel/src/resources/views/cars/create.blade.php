@extends('layouts.bootstrap')

@section('title', 'Create Car')

@section('content')
    <div class="container">
        <h1>Create Color</h1>

        <form action="{{ route('cars.store') }}" method="POST"  enctype="multipart/form-data" >
            @csrf
            <div class="form-group">
                <label for="name">Car Name</label>
                <input type="text" class="form-control" id="name" name="name" required>
            </div>
            <button type="submit" class="btn btn-primary">Create</button>
        </form>
    </div>
@endsection
