@extends('index')

@section('content')
    <nav aria-label="breadcrumb" class="py-3 mx-2">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="{{ route('home') }}">Home</a>
            </li>

            <li class="breadcrumb-item">
                <a href="{{ route('brand.list') }}">Silniki</a>
            </li>

            <li class="breadcrumb-item active" aria-current="page">
                {{ $brand['name'] }}
            </li>
        </ol>
    </nav>

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8">
                <div class="row">
                    @forelse ($engines as $engine)
                        <a class="col-3 border text-bg-dark rounded my-2 mx-2 brand-a" title="Przejdź do szczegółów"
                            href="{{ route('engine.details', $engine->slug) }}">

                            <div class="brand-hover">
                                <div class="text-center py-2 {{ $engine->fuelType->getBackgroundColor() }}"
                                    style="border-bottom-left-radius: 2em; border-bottom-right-radius: 2em;">
                                    <h5>
                                        {{ $engine->name }}
                                    </h5>
                                </div>

                                <div class="d-flex flex-wrap align-items-center justify-content-around py-2">
                                    <div>
                                        {{ $engine->fuelType->getTranslatedName() }}
                                    </div>
                                </div>
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

            <div class="col-md-2">
                <div class="btn btn-success p-auto mx-1">
                    <h6>Zobacz też</h6>
                </div>

                <div class="d-flex flex-wrap flex-column mt-3">
                    @foreach ($otherBrands as $brand)
                        <a class="card py-2 my-2 brand-a" title="Przejdź do szczegółów"
                            href="{{ route('engine.list', $brand->slug) }}">

                            <div>
                                <img src="{{ $brand->logo }}" class="card-img mx-auto d-block" style="max-width: 25%;"
                                    alt="{{ $brand->name }} logo">
                            </div>

                            <div class="text-center mx-auto py-2">
                                <h5>Silniki {{ $brand->name }}</h5>
                            </div>
                        </a>
                    @endforeach
                </div>
            </div>
        </div>
    @endsection
