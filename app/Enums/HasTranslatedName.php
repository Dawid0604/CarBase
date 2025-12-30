<?php

declare(strict_types=1);

namespace App\Enums;

interface HasTranslatedName
{
    public function getTranslatedName(): string;
}
