<?php

declare(strict_types=1);

use App\Enums\CarDriveType;

describe('CarDriveType tests', function (): void {
    itHasUniqueEnumValues(CarDriveType::class);
});
