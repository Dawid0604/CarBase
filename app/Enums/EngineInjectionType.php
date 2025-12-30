<?php

declare(strict_types=1);

namespace App\Enums;

use Override;

enum EngineInjectionType: string implements HasTranslatedName
{
    case DIRECT = 'DIRECT';
    case INDIRECT = 'INDIRECT';
    case MULTIPOINT = 'MULTIPOINT';
    case COMMON_RAIL = 'COMMON_RAIL';

    #[Override]
    public function getTranslatedName(): string
    {
        return match ($this) {
            EngineInjectionType::DIRECT => 'Bezpośredni',
            EngineInjectionType::INDIRECT => 'Pośredni',
            EngineInjectionType::MULTIPOINT => 'Wielopunktowy',
            EngineInjectionType::COMMON_RAIL => 'Common Rail'
        };
    }
}
