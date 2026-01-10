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

            <li class="breadcrumb-item active" aria-current="page">
                {{ $brand['name'] }} - modele
            </li>
        </ol>
    </nav>

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="row">
                    @forelse ($models as $model)
                        <a class="col-md-3 border text-bg-dark rounded my-2 mx-2 brand-a" title="Przejdź do szczegółów"
                            href="{{ route('car.generation.list',  ['slug' => $model->slug]) }}">

                            <div class="row text-center">
                                <div class="col-md-6 d-flex align-items-center ">
                                    <h5 class="my-2 brand-hover">
                                        {{ $model->name }} ({{ $model->numberOfGenerations}})
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
    </div>
@endsection
