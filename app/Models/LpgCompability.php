<?php

declare(strict_types=1);

namespace App\Models;

enum LpgCompability: string
{
    case UNAVAILABLE = 'UNAVAILABLE';
    case POOR = 'POOR';
    case GOOD = 'GOOD';

    public function getTranslatedName(): string
    {
        return match($this) {
            LpgCompability::UNAVAILABLE => 'Niedostępne',
            LpgCompability::POOR => 'Potencjalne problemy',
            LpgCompability::GOOD => 'Dobrze współpracuje'
        };
    }
}
