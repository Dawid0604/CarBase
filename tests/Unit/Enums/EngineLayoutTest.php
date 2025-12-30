<?php

declare(strict_types=1);

use App\Enums\EngineLayout;

describe('EngineLayout tests', function (): void {

    describe('getTranslatedName() tests', function (): void {
        itHasValidTranslatedName(EngineLayout::class);
    });

    itHasUniqueEnumValues(EngineLayout::class);
});
