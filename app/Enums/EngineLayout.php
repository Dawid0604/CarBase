<?php

declare(strict_types=1);

namespace App\Enums;

use Override;

enum EngineLayout: string implements HasTranslatedName
{
    case THREE = '3';
    case FOUR = '4';
    case FIVE = '5';
    case V6 = 'V6';
    case V8 = 'V8';
    case V10 = 'V10';
    case V12 = 'V12';

    #[Override]
    public function getTranslatedName(): string
    {
        return match ($this) {
            EngineLayout::THREE => 'Trzy cylindrowy',
            EngineLayout::FOUR => 'Cztero cylindrowy',
            EngineLayout::FIVE => 'Pięcio cylindrowy',
            default => $this->value,
        };
    }
}
