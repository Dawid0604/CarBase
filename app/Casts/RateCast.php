<?php

declare(strict_types=1);

namespace App\Casts;

use Illuminate\Contracts\Database\Eloquent\CastsAttributes;
use Illuminate\Database\Eloquent\Model;
use Override;

/**
 * @implements CastsAttributes<int, int>
 */
final class RateCast implements CastsAttributes
{
    /**
     * Cast the given value.
     *
     * @phpstan-ignore-next-line
     * @SuppressWarnings(PHPMD.UnusedFormalParameter)
     * @param  array<string, mixed>  $attributes
     */
    #[Override]
    public function get(Model $model, string $key, mixed $value, array $attributes): int
    {
        return $value;
    }

    /**
     * Prepare the given value for storage.
     *
     * @phpstan-ignore-next-line
     * @SuppressWarnings(PHPMD.UnusedFormalParameter)
     * @param  array<string, mixed>  $attributes
     */
    #[Override]
    public function set(Model $model, string $key, mixed $value, array $attributes): int
    {
        return static::getRateValue($value);
    }

    private static function getRateValue(int $value): int
    {
        return max(1, min(5, $value));
    }
}
