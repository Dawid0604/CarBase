<?php

declare(strict_types=1);

namespace App\Enums;

use Override;

enum LpgCompability: string implements HasTranslatedName
{
    case UNAVAILABLE = 'UNAVAILABLE';
    case POOR = 'POOR';
    case GOOD = 'GOOD';

    #[Override]
    public function getTranslatedName(): string
    {
        return match ($this) {
            LpgCompability::UNAVAILABLE => 'Niedostępne',
            LpgCompability::POOR => 'Potencjalne problemy',
            LpgCompability::GOOD => 'Dobrze współpracuje'
        };
    }
}
