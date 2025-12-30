<?php

declare(strict_types=1);

arch('app uses strict types')
    ->expect('App')
    ->toUseStrictTypes();

arch('app avoids debug functions')
    ->expect('App')
    ->not()->toUse(['die', 'dd', 'dump', 'var_dump', 'print_r']);

arch('models are used only in repositories')
    ->expect('App\Models')
    ->toOnlyBeUsedIn([
        'App\Repositories',
        'Database\Seeders',
        'App\ValueObjects',
        'App\Models'
    ])
    ->ignoring([
        'App\Services\UserServiceImpl',
        'App\Services\UserService',
        'App\Http\Controllers\Auth\RegisterController'
    ]);

arch('services are final')
    ->expect('App\Services')
    ->classes()
    ->toBeFinal();

arch('repositories are final')
    ->expect('App\Repositories')
    ->classes()
    ->toBeFinal();

arch('controllers are final')
    ->expect('App\Http')
    ->classes()
    ->toBeFinal()
    ->ignoring('App\Http\Controllers\Controller')
    ->toExtend(App\Http\Controllers\Controller::class);

arch('repositories are used only in services')
    ->expect('App\Repositories')
    ->toOnlyBeUsedIn([
        'App\Services',
        'App\Repositories',
        'App\Providers'
    ]);

arch('services are used only in http')
    ->expect('App\Services')
    ->toOnlyBeUsedIn([
        'App\Http',
        'App\Services',
        'App\Providers'
    ]);

arch('value objects are readonly')
    ->expect('App\ValueObjects')
    ->classes()
    ->toBeReadonly();
