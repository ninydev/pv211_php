@extends('layouts.bootstrap')

@section('title', 'Colors')

@section('content')
    <div class="container">
        <h1>Colors</h1>
        <a href="{{config('app.url')}}/colors/create" class="btn btn-primary">Add Color</a>

        <table class="table table-striped">
            <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Hex Code</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($colors as $color)
                <tr>
                    <td>{{ $color->id }}</td>
                    <td>{{ $color->name }}</td>
                    <td style="background-color: {{ $color->hex }};">{{ $color->hex }}</td>
                    <td>
                        <a href="{{route('colors.edit', $color->id) }}"  class="btn btn-secondary"> Edit </a>
                        <form action="{{ route('colors.destroy', $color->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>

        <!-- Pagination links -->
        {{ $colors->links() }}
    </div>
@endsection
