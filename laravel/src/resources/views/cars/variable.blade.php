@extends('layouts.bootstrap')

@section('title', 'Variable of cars')

@section('content')
    <div class="container">
        <h1>Variable of cars</h1>

        <section>
            <div id="carouselExampleSlidesOnly" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner" id="carSlider1">
                    @foreach($cars as $car)
                        @foreach($car->colors as $carColor)
                        <div class="carousel-item">
                            <img src="{{ asset('storage/' . $carColor->url)  }}" class="d-block w-100" alt=" {{ $carColor->name  }}">
                        </div>
                        @endforeach
                    @endforeach
                </div>
                <button class="carousel-control-prev" type="button"
                        data-bs-target="#carouselExampleSlidesOnly" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button"
                        data-bs-target="#carouselExampleSlidesOnly" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
        </section>

        <script>
            document.getElementById('carSlider1').firstElementChild.classList.add('active');
        </script>


        <main>
            <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-indicators">
                    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
                    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
                </div>
                <div class="carousel-inner">

            @foreach($all as $car)

                        <div class="carousel-item active">
                            <img src=" .. " class="d-block w-100" alt="...">
                            <div class="carousel-caption d-none d-md-block">
                                <h5>{{ $car->name  }}</h5>
                                <ul>
                                    @foreach($car->colors as $carColor)
                                        <li>{{ $carColor->color->name }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>

            @endforeach

                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>

        </main>

        <div>
            <h3> Cars </h3>
            <select>
                @foreach ($cars as $car)
                    <option value="{{ $car->id }}">{{ $car->name }}</option>
                @endforeach
            </select>
        </div>
        <div>
            <h3> Colors </h3>
            <select>
                @foreach ($colors as $color)
                    <option value="{{ $color->id }}">{{ $color->name }}</option>
                @endforeach
            </select>
        </div>
    </div>
@endsection




</div>
