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

            <li class="breadcrumb-item">
                <a href="{{ route('engine.list', $data->brand['slug']) }}">{{ $data->brand['name'] }}</a>
            </li>

            <li class="breadcrumb-item active" aria-current="page">
                {{ $data->name }}
            </li>
        </ol>
    </nav>

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-3 text-white p-3 border rounded border-light engine-image">
                <img src="{{ $data->brand['logo'] }}" alt="{{ $data->brand['name'] }} logo"
                    class="img-thumbnail mx-auto d-block" style="max-width: 60%;">
            </div>

            <div class="col-md-6 mt-5 mx-3">
                <div class="row">
                    <div class="col-11 bg-secondary text-white p-3 border rounded">
                        <h3 class="h3">
                            <i class="bi bi-arrow-right-circle-fill"></i> &nbsp;
                            {{ $data->brand['name'] }} &nbsp; {{ $data->name }}
                        </h3>
                    </div>

                    <div class="col-11 text-white my-3 text-center px-0">
                        <div class="container mx-0">
                            <div class="row">
                                @php
                                    $fuelType = $data->technicalData['fuel_type'];
                                    $fuelTypeBgColor = $fuelType->getBackgroundColor();
                                    $fuelTypeName = $fuelType->getTranslatedName();
                                @endphp

                                <div class="py-1 px-1 col-3 {{ $fuelTypeBgColor }} border border-light rounded">
                                    <i class="bi bi-fuel-pump-fill"></i>
                                    {{ $fuelTypeName }}
                                </div>

                                <div class="py-1 px-1 col-3 gradient-blue-green-yellow border border-light rounded">
                                    <i class="bi bi-lightning-charge-fill"></i>
                                    {{ $data->technicalData['power'] }} KM
                                </div>

                                <div class="py-1 px-1 col-3 gradient-purple-orange border border-light rounded">
                                    <i class="bi bi-fire"></i>
                                    {{ $data->technicalData['turbocharger'] ? 'Doładowany' : 'Bez doładowania' }}
                                </div>

                                <div class="py-1 px-1 col-3 gradient-blue border border-light rounded">
                                    <i class="bi bi-eye-fill"></i>
                                    {{ $data->stats['number_of_views'] }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-9 mt-4">
                <div class="row">
                    <div class="col-12 bg-secondary text-white p-3 mb-4 border rounded">
                        <h1>
                            <i class="bi bi-body-text"></i>
                            Opis
                        </h1>

                        <p>
                            {{ $data->description }}
                        </p>
                    </div>

                    <div class="col-12 p-3 mb-4 d-flex flex-row flex-wrap border rounded border-dark">
                        <div class="col-6">
                            <h1 class="h1">
                                <i class="bi bi-shield-fill-plus"></i>
                                Zalety
                            </h1>

                            @php
                                $advantages = $data->technicalData['advantages'] ?? [];
                            @endphp

                            <ul>
                                @foreach ($advantages as $advantage)
                                    <li>
                                        {{ $advantage }}
                                    </li>
                                @endforeach
                            </ul>
                        </div>

                        <div class="col-6">
                            <h1 class="h1">
                                <i class="bi bi-shield-fill-minus"></i>
                                Wady
                            </h1>

                            @php
                                $disadvantages = $data->technicalData['disadvantages'] ?? [];
                            @endphp

                            <ul>
                                @foreach ($disadvantages as $disadvantage)
                                    <li>
                                        {{ $disadvantage }}
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>

                    <div class="col-12 p-3 mb-4 border rounded border-dark">
                        @php
                            $technicalData = $data->technicalData;
                            $noInfo = 'Brak informacji';
                        @endphp

                        <table class="table">
                            <thead>
                                <th>
                                    <i class="bi bi-info-circle-fill"></i>
                                    Dodatkowe cechy
                                </th>
                            </thead>

                            <tbody class="table-group-divider">
                                @if ($fuelType->shouldShowLpgInfo())
                                    <tr>
                                        <td>Lpg: </td>
                                        <td>{{ $technicalData['lpg'] ?? $noInfo }}</td>
                                    </tr>
                                @endif

                                <tr>
                                    <td>Układ silnika: </td>
                                    <td>{{ $technicalData['engine_layout'] ?? $noInfo }}</td>
                                </tr>

                                <tr>
                                    <td>Liczba zaworów: </td>
                                    <td>{{ $technicalData['valve_count'] ?? $noInfo }}</td>
                                </tr>

                                <tr>
                                    <td>Rodzaj wtrysku: </td>
                                    <td>{{ $technicalData['injection_type'] ?? $noInfo }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    <div class="col-12 bg-danger text-white p-3 border rounded">
                        <h4>
                            <i class="bi bi-chat-left-quote-fill"></i>
                            Opinie użytkowników (45)
                        </h4>

                        <div class="row mx-5 my-4">
                            <table class="table">
                                <thead>
                                    <th class="text-center py-3">
                                        Średnia
                                    </th>

                                    <th class="py-3 mx-2">
                                        <i class="bi bi-star-fill text-warning"></i>
                                        <i class="bi bi-star-fill text-warning"></i>
                                        <i class="bi bi-star-fill text-warning"></i>
                                        <i class="bi bi-star-fill text-warning"></i>
                                        <i class="bi bi-star-fill text-secondary-subtle"></i>
                                    </th>
                                </thead>

                                <tbody>
                                    <tr>
                                        <td class="text-center py-3">Trwałość</td>
                                        <td>
                                            <i class="bi bi-star-fill text-warning"></i>
                                            <i class="bi bi-star-fill text-warning"></i>
                                            <i class="bi bi-star-fill text-warning"></i>
                                            <i class="bi bi-star-fill text-warning"></i>
                                            <i class="bi bi-star-fill text-secondary-subtle"></i>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td class="text-center py-3">Spalanie paliwa</td>
                                        <td>
                                            <i class="bi bi-star-fill text-warning"></i>
                                            <i class="bi bi-star-fill text-warning"></i>
                                            <i class="bi bi-star-fill text-warning"></i>
                                            <i class="bi bi-star-fill text-warning"></i>
                                            <i class="bi bi-star-fill text-secondary-subtle"></i>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td class="text-center py-3">Dynamika</td>
                                        <td>
                                            <i class="bi bi-star-fill text-warning"></i>
                                            <i class="bi bi-star-fill text-warning"></i>
                                            <i class="bi bi-star-fill text-warning"></i>
                                            <i class="bi bi-star-fill text-warning"></i>
                                            <i class="bi bi-star-fill text-secondary-subtle"></i>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <div class="col-12 text-white p-5 border rounded my-4 border-dark">
                        <div class="row">
                            <div title="@guest Zaloguj się by dodać opinię @endguest"
                                style="@auth cursor: pointer; @endauth">

                                <button type="button" class="btn btn-primary @guest disabled @endguest"
                                    data-bs-toggle="modal" data-bs-target="#exampleModal">
                                    Dodaj opinię o silniku
                                </button>

                                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                                    aria-hidden="true">

                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Dodaj opinię o silniku</h5>

                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close">
                                                </button>
                                            </div>

                                            <div class="modal-body">
                                                @livewire('engine-review-form', ['engineSlug' => $data->slug])
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="btn-group btn-group-toggle my-3" data-toggle="buttons">
                                <label class="btn btn-secondary active">
                                    <input type="radio" name="options" id="option1" autocomplete="off" checked>
                                    <i class="bi bi-plus-slash-minus"></i>
                                    Wszystkie
                                </label>

                                <label class="btn btn-secondary">
                                    <input type="radio" name="options" id="option2" autocomplete="off">
                                    <i class="bi bi-hand-thumbs-up-fill"></i>
                                    Pozytywne (0)
                                </label>

                                <label class="btn btn-secondary">
                                    <input type="radio" name="options" id="option3" autocomplete="off">

                                    <i class="bi bi-hand-thumbs-down-fill"></i>
                                    Negatywne (0)
                                </label>
                            </div>
                        </div>

                        <div class="row py-4 mx-auto">
                            <div class="card my-3 px-0">
                                <div class="card-header">
                                    <div>
                                        Alfa Romeo Giulietta 1.4 TB
                                    </div>

                                    <div>
                                        <i class="bi bi-star-fill text-warning"></i>
                                        <i class="bi bi-star-fill text-warning"></i>
                                        <i class="bi bi-star-fill text-warning"></i>
                                        <i class="bi bi-star-fill text-warning"></i>
                                        <i class="bi bi-star-fill text-secondary-subtle"></i>
                                    </div>

                                    <div>
                                        <i class="bi bi-hand-thumbs-up-fill"></i>
                                        Polecam
                                    </div>
                                </div>

                                <div class="card-body">
                                    <blockquote class="blockquote mb-0"></blockquote>
                                    <p>
                                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere erat a
                                        ante.
                                        Lorem ipsum dolor sit amet consectetur, adipisicing elit. Delectus voluptatum dolor
                                        assumenda a omnis consectetur eveniet totam velit esse. Maxime, vero explicabo?
                                        Dolorem nulla consequatur itaque dolorum. Temporibus, id deserunt.
                                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Ad nemo necessitatibus
                                        facere, aliquid qui, consequatur impedit voluptates rem suscipit sequi quo veritatis
                                        dolorum excepturi consequuntur hic, optio esse ratione a.
                                    </p>

                                    <footer class="blockquote-footer my-1">12-12-2024 &nbsp;
                                        <cite title="Source Title">
                                            <i class="bi bi-person-circle"></i>
                                            Paweł
                                        </cite>
                                    </footer>
                                    </blockquote>
                                </div>
                            </div>

                            <div class="card my-3 px-0">
                                <div class="card-header">
                                    <div>
                                        Alfa Romeo Giulietta 1.4 TB
                                    </div>

                                    <div>
                                        <i class="bi bi-star-fill text-warning"></i>
                                        <i class="bi bi-star-fill text-warning"></i>
                                        <i class="bi bi-star-fill text-warning"></i>
                                        <i class="bi bi-star-fill text-warning"></i>
                                        <i class="bi bi-star-fill text-secondary-subtle"></i>
                                    </div>

                                    <div>
                                        <i class="bi bi-hand-thumbs-up-fill"></i>
                                        Polecam
                                    </div>
                                </div>

                                <div class="card-body">
                                    <blockquote class="blockquote mb-0"></blockquote>
                                    <p>
                                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere erat a
                                        ante.
                                        Lorem ipsum dolor sit amet consectetur, adipisicing elit. Delectus voluptatum dolor
                                        assumenda a omnis consectetur eveniet totam velit esse. Maxime, vero explicabo?
                                        Dolorem nulla consequatur itaque dolorum. Temporibus, id deserunt.
                                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Ad nemo necessitatibus
                                        facere, aliquid qui, consequatur impedit voluptates rem suscipit sequi quo veritatis
                                        dolorum excepturi consequuntur hic, optio esse ratione a.
                                    </p>

                                    <footer class="blockquote-footer my-1">12-12-2024 &nbsp;
                                        <cite title="Source Title">
                                            <i class="bi bi-person-circle"></i>
                                            Edward
                                        </cite>
                                    </footer>
                                    </blockquote>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <nav aria-label="Page navigation example">
                                <ul class="pagination justify-content-end">
                                    <li class="page-item disabled">
                                        <a class="page-link" href="#" tabindex="-1">Previous</a>
                                    </li>
                                    <li class="page-item"><a class="page-link" href="#">1</a></li>
                                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                                    <li class="page-item">
                                        <a class="page-link" href="#">Next</a>
                                    </li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
