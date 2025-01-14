@extends('layouts.bootstrap')

@section('title', 'Cars')

@section('content')
    <div class="container">
        <h1>Cars</h1>
        <a href="{{route('cars.create')}}" class="btn btn-primary">Add Cars</a>

        <table class="table">
            <thead>
            <tr>
                <th>Name</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($cars as $car)
                <tr>
                    <td>{{ $car->name }}</td>
                    <td>
                        <a href="{{ route('cars.show', $car->id) }}" class="btn btn-info">View</a>
                        <a href="{{ route('cars.edit', $car->id) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('cars.destroy', $car->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        {{ $cars->links('pagination::bootstrap-4') }}
    </div>
@endsection
