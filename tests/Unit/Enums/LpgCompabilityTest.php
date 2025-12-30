<?php

declare(strict_types=1);

use App\Enums\LpgCompability;

describe('LpgCompability tests', function (): void {

    describe('getTranslatedName() tests', function (): void {
        itHasValidTranslatedName(LpgCompability::class);
    });

    itHasUniqueEnumValues(LpgCompability::class);
});
