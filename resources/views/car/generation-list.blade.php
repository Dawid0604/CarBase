@extends('index')

@section('content')
    <nav aria-label="breadcrumb" class="py-3 mx-2">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="{{ route('home') }}">Home</a>
            </li>

            <li class="breadcrumb-item">
                <a href="{{ route('car.brand.list') }}">Samochody</a>
            </li>

            <li class="breadcrumb-item">
                <a href="{{ route('car.model.list', $brand['slug']) }}">
                    {{ $brand['name'] }}
                </a>
            </li>

            <li class="breadcrumb-item active" aria-current="page">
                {{ $model['name'] }} - generacje
            </li>
        </ol>
    </nav>

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="row">
                    @forelse ($generations as $generation)
                        <a class="col-md-3 border text-bg-dark rounded my-2 mx-2 brand-a brand-hover" title="Przejdź do szczegółów"
                            href="{{ route('car.generation.list', ['slug' => $model['slug']]) }}">

                            <div class="col-md-6 mx-auto py-2 d-flex align-items-center">
                                <img src="{{ $generation->image }}" class="img-thumbnail mx-auto d-block"
                                    style="max-width: 100%;" alt="{{ $generation->name }} thumbnail">
                            </div>

                            <div class="col-md-6 mx-auto py-2">
                                <p class="col-md-12 text-center bg-success rounded">
                                    Data produkcji:
                                </p>

                                <p class="col-md-12 text-center">
                                    {{ $generation->productionFrom }} - {{ $generation->productionTo }}
                                </p>
                            </div>
                        </a>
                    @empty
                        <div class="alert alert-warning" role="alert">
                            <h4 class="alert-heading">Drogi użytkowniku</h4>
                            <p>Nie udało się znaleźć podanego zasobu</p>
                            <hr>
                            <p class="mb-0">
                                Spróbuj ponownie później.
                            </p>
                        </div>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
@endsection
