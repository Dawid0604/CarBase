<?php

declare(strict_types=1);

namespace App\Models;

enum EngineLayout: string
{
    case THREE = '3';
    case FOUR = '4';
    case FIVE = '5';
    case V6 = 'V6';
    case V8 = 'V8';
    case V10 = 'V10';
    case V12 = 'V12';
}
