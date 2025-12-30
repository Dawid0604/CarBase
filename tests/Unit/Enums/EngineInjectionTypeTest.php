<?php

declare(strict_types=1);

use App\Enums\EngineInjectionType;

describe('EngineInjectionType tests', function (): void {

    describe('getTranslatedName() tests', function (): void {
        itHasValidTranslatedName(EngineInjectionType::class);
    });

    itHasUniqueEnumValues(EngineInjectionType::class);
});
