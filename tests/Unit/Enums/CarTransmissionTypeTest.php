<?php

declare(strict_types=1);

use App\Enums\CarTransmissionType;

describe('CarTransmissionType tests', function (): void {
    itHasUniqueEnumValues(CarTransmissionType::class);
});
