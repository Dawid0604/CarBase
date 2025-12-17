@extends('index')

@section('content')
    <div class="row g-0">
        <div class="col-md-2 bg-light border-end d-flex flex-column">
            <div class="flex-fill border-bottom p-3 overflow-auto">
                <h5 class="mb-3 header-section">
                    <i class="bi bi-plus-circle-fill me-2"></i>
                    New engines
                </h5>

                @forelse ($engines['newest'] as $engine)
                    <a href="{{ route('engine.details', $engine->slug) }}" class="engine_link" title="Dowiedz się więcej">
                        <div class="card p-2 mb-2 text-center">
                            <img src="{{ $engine->brand['logo'] }}" alt="{{ $engine->brand['name'] }} logo"
                                class="img-thumbnail mx-auto d-block" style="max-width: 40%;">

                            <h6 class="card-title mb-1 mt-2">{{ $engine->name }}</h6>

                            <div class="d-flex justify-content-center align-items-center p-1 flex-wrap">
                                <span class="m-1 badge bg-success">{{ $engine->fuelType }}</span>
                                <span class="m-1 badge bg-warning">{{ $engine->power }} KM</span>
                            </div>
                        </div>
                    </a>
                @empty
                    <p>Brak silników do wyświetlenia</p>
                @endforelse
            </div>

            <div class="flex-fill p-3 overflow-auto">
                <h5 class="mb-3 header-section">
                    <i class="bi bi-star-fill me-2"></i>
                    Popular engines
                </h5>

                @forelse ($engines['popular'] as $engine)
                    <a href="{{ route('engine.details', $engine->slug) }}" class="engine_link" title="Dowiedz się więcej">
                        <div class="card p-2 mb-2 text-center">
                            <img src="{{ $engine->brand['logo'] }}" alt="{{ $engine->brand['name'] }} logo"
                                class="img-thumbnail mx-auto d-block" style="max-width: 40%;">

                            <h6 class="card-title mb-1 mt-2">{{ $engine->name }}</h6>

                            <div class="d-flex justify-content-center align-items-center p-1 flex-wrap">
                                <span class="m-1 badge bg-success">{{ $engine->fuelType }}</span>
                                <span class="m-1 badge bg-warning">{{ $engine->power }} KM</span>
                            </div>

                            <div class="d-flex justify-content-center align-items-center p-1 flex-wrap">
                                <span class="m-1 badge bg-success">
                                    {{ $engine->stats['likes'] }} <i class="bi bi-hand-thumbs-up-fill"></i>
                                </span>

                                <span class="m-1 badge bg-danger">
                                    {{ $engine->stats['dislikes'] }} <i class="bi bi-hand-thumbs-down-fill"></i>
                                </span>

                                <span class="m-1 badge bg-info">
                                    {{ $engine->stats['number_of_views'] }} <i class="bi bi-eye-fill"></i>
                                </span>
                            </div>
                        </div>
                    </a>
                @empty
                    <p>Brak silników do wyświetlenia</p>
                @endforelse
            </div>
        </div>

        <div class="col-md-10 bg-white d-flex flex-row flex-wrap">
            <div class="col-md-6">
                <div class="flex-fill border-end p-3 overflow-auto">
                    <h5 class="mb-3 header-section">
                        <i class="bi bi-newspaper me-2"></i>
                        Newest reviews
                    </h5>

                    <div class="card p-2 mb-2">
                        <div class="row g-0">
                            <div class="col-md-4">
                                <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQO1xYE_wkP9lQErBE9NSO3SQc0FoVw4ZVkew&s"
                                    alt="Renault logo" class="img-thumbnail mx-auto d-block">
                            </div>

                            <div class="col-md-8">
                                <div class="card-body">
                                    <h5 class="card-title">Alfa Romeo Giulietta</h5>

                                    <div class="mt-2 mb-2">
                                        <div class="f-flex align-items-center mb-2">
                                            <div class="d-flex gap-1">
                                                <span class="fw-semibold text-secondary me-3">Komfort:</span>
                                                <i class="bi bi-star-fill text-warning"></i>
                                                <i class="bi bi-star-fill text-warning"></i>
                                                <i class="bi bi-star-fill text-warning"></i>
                                                <i class="bi bi-star-fill text-warning"></i>
                                                <i class="bi bi-star-fill text-secondary-subtle"></i>
                                            </div>

                                            <div class="d-flex gap-1">
                                                <span class="fw-semibold text-secondary me-3">Niezawodność:</span>
                                                <i class="bi bi-star-fill text-warning"></i>
                                                <i class="bi bi-star-fill text-warning"></i>
                                                <i class="bi bi-star-fill text-warning"></i>
                                                <i class="bi bi-star-fill text-warning"></i>
                                                <i class="bi bi-star-fill text-secondary-subtle"></i>
                                            </div>

                                            <div class="d-flex gap-1">
                                                <span class="fw-semibold text-secondary me-3">Koszta utrzymania:</span>
                                                <i class="bi bi-star-fill text-warning"></i>
                                                <i class="bi bi-star-fill text-warning"></i>
                                                <i class="bi bi-star-fill text-warning"></i>
                                                <i class="bi bi-star-fill text-warning"></i>
                                                <i class="bi bi-star-fill text-secondary-subtle"></i>
                                            </div>

                                            <div class="d-flex gap-1">
                                                <span class="fw-semibold text-secondary me-3">Pobór paliwa:</span>
                                                <i class="bi bi-star-fill text-warning"></i>
                                                <i class="bi bi-star-fill text-warning"></i>
                                                <i class="bi bi-star-fill text-warning"></i>
                                                <i class="bi bi-star-fill text-warning"></i>
                                                <i class="bi bi-star-fill text-secondary-subtle"></i>
                                            </div>
                                        </div>
                                    </div>

                                    <p class="card-text">
                                        <small class="text-body-secondary">3 days ago</small>
                                        <span class="m-1 badge bg-success">Rekomendacja</span>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card p-2 mb-2">
                        <div class="row g-0">
                            <div class="col-md-4">
                                <img src="https://di-uploads-pod5.dealerinspire.com/jaguartreasurecoast/uploads/2019/02/2019-jaguar-xj-fort-pierce-fl.jpg"
                                    alt="Renault logo" class="img-thumbnail mx-auto d-block">
                            </div>

                            <div class="col-md-8">
                                <div class="card-body">
                                    <h5 class="card-title">Jaguar XJ</h5>

                                    <div class="mt-2 mb-2">
                                        <div class="f-flex align-items-center mb-2">
                                            <div class="d-flex gap-1">
                                                <span class="fw-semibold text-secondary me-3">Komfort:</span>
                                                <i class="bi bi-star-fill text-warning"></i>
                                                <i class="bi bi-star-fill text-warning"></i>
                                                <i class="bi bi-star-fill text-warning"></i>
                                                <i class="bi bi-star-fill text-warning"></i>
                                                <i class="bi bi-star-fill text-secondary-subtle"></i>
                                            </div>

                                            <div class="d-flex gap-1">
                                                <span class="fw-semibold text-secondary me-3">Niezawodność:</span>
                                                <i class="bi bi-star-fill text-warning"></i>
                                                <i class="bi bi-star-fill text-warning"></i>
                                                <i class="bi bi-star-fill text-warning"></i>
                                                <i class="bi bi-star-fill text-warning"></i>
                                                <i class="bi bi-star-fill text-secondary-subtle"></i>
                                            </div>

                                            <div class="d-flex gap-1">
                                                <span class="fw-semibold text-secondary me-3">Koszta utrzymania:</span>
                                                <i class="bi bi-star-fill text-warning"></i>
                                                <i class="bi bi-star-fill text-warning"></i>
                                                <i class="bi bi-star-fill text-warning"></i>
                                                <i class="bi bi-star-fill text-warning"></i>
                                                <i class="bi bi-star-fill text-secondary-subtle"></i>
                                            </div>

                                            <div class="d-flex gap-1">
                                                <span class="fw-semibold text-secondary me-3">Pobór paliwa:</span>
                                                <i class="bi bi-star-fill text-warning"></i>
                                                <i class="bi bi-star-fill text-warning"></i>
                                                <i class="bi bi-star-fill text-warning"></i>
                                                <i class="bi bi-star-fill text-warning"></i>
                                                <i class="bi bi-star-fill text-secondary-subtle"></i>
                                            </div>
                                        </div>
                                    </div>

                                    <p class="card-text">
                                        <small class="text-body-secondary">7 days ago</small>
                                        <span class="m-1 badge bg-danger">Nie polecam</span>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="flex-fill p-3 overflow-auto">
                    <h5 class="mb-3 header-section">
                        <i class="bi bi-newspaper me-2"></i>
                        Newest engine reviews
                    </h5>

                    <div class="card p-2 mb-2">
                        <div class="row g-0">
                            <div class="col-md-4">
                                <img src="https://1000logos.net/wp-content/uploads/2024/04/Stellantis-Logo-2020-prelaunch-500x281.png"
                                    alt="Renault logo" class="img-thumbnail mx-auto d-block">
                            </div>

                            <div class="col-md-8">
                                <div class="card-body">
                                    <h5 class="card-title">PSA 1.2 PureTech Turbo</h5>

                                    <div class="mt-2 mb-2">
                                        <div class="f-flex align-items-center mb-2">
                                            <div class="d-flex gap-1">
                                                <span class="fw-semibold text-secondary me-3">Trwałość:</span>
                                                <i class="bi bi-star-fill text-warning"></i>
                                                <i class="bi bi-star-fill text-secondary-subtle"></i>
                                                <i class="bi bi-star-fill text-secondary-subtle"></i>
                                                <i class="bi bi-star-fill text-secondary-subtle"></i>
                                                <i class="bi bi-star-fill text-secondary-subtle"></i>
                                            </div>

                                            <div class="d-flex gap-1">
                                                <span class="fw-semibold text-secondary me-3">Dynamika:</span>
                                                <i class="bi bi-star-fill text-warning"></i>
                                                <i class="bi bi-star-fill text-warning"></i>
                                                <i class="bi bi-star-fill text-warning"></i>
                                                <i class="bi bi-star-fill text-warning"></i>
                                                <i class="bi bi-star-fill text-secondary-subtle"></i>
                                            </div>

                                            <div class="d-flex gap-1">
                                                <span class="fw-semibold text-secondary me-3">Koszta utrzymania:</span>
                                                <i class="bi bi-star-fill text-warning"></i>
                                                <i class="bi bi-star-fill text-secondary-subtle"></i>
                                                <i class="bi bi-star-fill text-secondary-subtle"></i>
                                                <i class="bi bi-star-fill text-secondary-subtle"></i>
                                                <i class="bi bi-star-fill text-secondary-subtle"></i>
                                            </div>

                                            <div class="d-flex gap-1">
                                                <span class="fw-semibold text-secondary me-3">Spalanie:</span>
                                                <i class="bi bi-star-fill text-warning"></i>
                                                <i class="bi bi-star-fill text-warning"></i>
                                                <i class="bi bi-star-fill text-warning"></i>
                                                <i class="bi bi-star-fill text-warning"></i>
                                                <i class="bi bi-star-fill text-secondary-subtle"></i>
                                            </div>
                                        </div>
                                    </div>

                                    <p class="card-text">
                                        Lorem ipsum dolor, sit amet consectetur adipisicing elit. Nisi, ipsum voluptatum
                                        beatae numquam perspiciatis rem. Veritatis quia exercitationem itaque nulla pariatur
                                        cum ex quis? Aspernatur, numquam facere? Nesciunt, molestiae consequuntur?
                                    </p>

                                    <p class="card-text">
                                        <small class="text-body-secondary">7 days ago</small>
                                        <span class="m-1 badge bg-danger">Nie polecam</span>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
