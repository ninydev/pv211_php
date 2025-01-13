@extends('layouts.bootstrap')

@section('title', 'Show Color')

@section('content')
    <div class="container">
        <h1>Show Color</h1>
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">{{ $color->name }}</h5>
                <p class="card-text">Hex Code: {{ $color->hex }}</p>
                <a href="{{ route('colors.index') }}" class="btn btn-primary">Back to Colors</a>
            </div>
        </div>
    </div>
@endsection
