@extends('index')

@section('content')
    <nav aria-label="breadcrumb" class="py-3 mx-2">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="{{ route('home') }}">Home</a>
            </li>

            <li class="breadcrumb-item">
                Silniki
            </li>
        </ol>
    </nav>

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="row">
                    @forelse ($brands as $brand)
                        <a class="col-md-3 border text-bg-dark rounded my-2 mx-2 brand-a" title="Przejdź do szczegółów"
                            href="{{ route('engine.list', $brand->slug) }}">

                            <div class="row text-center">
                                <div class="col-md-6 mx-auto py-2 d-flex align-items-center">
                                    <img src="{{ $brand->logo }}" class="img-thumbnail mx-auto d-block"
                                        style="max-width: 15%;" alt="{{ $brand->name }} logo">
                                </div>

                                <div class="col-md-6 d-flex align-items-center ">
                                    <h5 class="my-2 brand-hover">
                                        {{ $brand->name }} ({{ $brand->numberOfEngines }})
                                    </h5>
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
        </div>
    @endsection
