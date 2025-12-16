<?php

declare(strict_types=1);

namespace App\Models;

enum EngineFuelType: string
{
    case GASOLINE = 'GASOLINE';
    case DIESEL = 'DIESEL';
    case HYBRID = 'HYBRID';
    case ELECTRIC = 'ELECTRIC';

    public function getTranslatedName(): string
    {
        return match ($this) {
            EngineFuelType::GASOLINE => 'Benzyna',
            EngineFuelType::DIESEL => "Diesel",
            EngineFuelType::HYBRID => 'Hybryda',
            EngineFuelType::ELECTRIC => 'Elektryk'
        };
    }
}
