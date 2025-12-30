<?php

declare(strict_types=1);

use App\Enums\CarTimingBeltType;

describe('CarTimingBeltType tests', function (): void {
    itHasUniqueEnumValues(CarTimingBeltType::class);
});
