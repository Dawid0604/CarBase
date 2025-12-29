<?php

declare(strict_types=1);

namespace App\Livewire;

enum RatingField
{
    case RATING;
    case RELIABILITY;
    case CONSUMPTION;
    case DYNAMIC;
}
