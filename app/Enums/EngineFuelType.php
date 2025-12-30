<?php

declare(strict_types=1);

namespace App\Enums;

use Override;

enum EngineFuelType: string implements HasTranslatedName
{
    case GASOLINE = 'GASOLINE';
    case DIESEL = 'DIESEL';
    case HYBRID = 'HYBRID';
    case ELECTRIC = 'ELECTRIC';

    #[Override]
    public function getTranslatedName(): string
    {
        return match ($this) {
            EngineFuelType::GASOLINE => 'Benzyna',
            EngineFuelType::DIESEL => "Diesel",
            EngineFuelType::HYBRID => 'Hybryda',
            EngineFuelType::ELECTRIC => 'Elektryk'
        };
    }

    public function getBackgroundColor(): string
    {
        return match ($this) {
            EngineFuelType::GASOLINE => 'gradient-gasoline',
            EngineFuelType::DIESEL => 'gradient-diesel',
            EngineFuelType::HYBRID => 'gradient-hybrid',
            EngineFuelType::ELECTRIC => 'gradient-electric'
        };
    }

    public function shouldShowLpgInfo(): bool
    {
        return $this === EngineFuelType::GASOLINE || $this === EngineFuelType::HYBRID;
    }
}
