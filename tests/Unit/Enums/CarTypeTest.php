<?php

declare(strict_types=1);

use App\Enums\CarType;

describe('CarType tests', function (): void {
    itHasUniqueEnumValues(CarType::class);
});
