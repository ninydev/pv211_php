@extends('layouts.bootstrap')

@section('title', 'Variable of cars')

@section('content')
    <div class="container">
        <h1>Variable of cars</h1>

        <style>
            .myColor img{
                width: 50px;
                height: 50px;
                margin: 10px;
                border-radius: 50%;
            }
        </style>

        <section>

            <div class="container mt-4">
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    @foreach($cars as $car)
                        <li class="nav-item" role="presentation">
                            <button class="nav-link"
                                    id="about-tab" data-bs-toggle="tab" data-bs-target="#carid_{{ $car->id  }}" type="button" role="tab"
                                    aria-controls="about" aria-selected="true">{{ $car->name }}</button>
                        </li>
                    @endforeach
                </ul>
                <div class="tab-content" id="myTabContent">

                    @foreach($cars as $car)
                        <div class="tab-pane fade show" id="carid_{{ $car->id  }}" role="tabpanel" aria-labelledby="about-tab">
                            <p>{{ $car->name  }}</p>

                            <img id="mainImg_{{ $car->id  }}" class="w-50" />

                            <div class="container">
                                <ul class="row">
                                    @foreach($car->colors as $carColor)
                                        <div class="col-1 myColor">
                                            <img src="{{ asset('storage/' . $carColor->color->url)  }}"
                                                 data-id="mainImg_{{ $car->id  }}"
                                                 data-url="{{ asset('storage/' . $carColor->url) }}"
                                                 class="d-block" alt=" {{ $carColor->color->name  }}">
                                        </div>
                                    @endforeach
                                </ul>

                            </div>
                        </div>
                    @endforeach

                </div>
            </div>

            <script>
                document.querySelectorAll('.myColor img').forEach(img => {
                    img.addEventListener('click', function() {
                        console.log(this.getAttribute('data-url'));
                        document.getElementById(this.getAttribute('data-id')).src = this.getAttribute('data-url');
                    });
                });
            </script>

            <script>
                document.getElementById('myTab').firstElementChild.classList.add('active');
                document.getElementById('myTabContent').firstElementChild.classList.add('active');
            </script>

        </section>

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

            <script>
                document.getElementById('carSlider1').firstElementChild.classList.add('active');
            </script>
        </section>





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
