<?php

declare(strict_types=1);

use App\Enums\UserRole;

describe('UserRole tests', function (): void {
    itHasUniqueEnumValues(UserRole::class);
});
