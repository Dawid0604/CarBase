<?php

declare(strict_types=1);

namespace App\Casts;

use Illuminate\Contracts\Database\Eloquent\CastsAttributes;
use Illuminate\Database\Eloquent\Model;
use Override;

/**
 * @implements CastsAttributes<array, string|array|null>
 */
final class MysqlSetCast implements CastsAttributes
{
    /**
     * Cast the given value.
     *
     * @phpstan-ignore-next-line
     * @SuppressWarnings(PHPMD.UnusedFormalParameter)
     * @param  array<string, mixed>  $attributes
     */
    #[Override]
    public function get(Model $model, string $key, mixed $value, array $attributes): array
    {
        return empty($value) ? [] : explode(',', $value);
    }

    /**
     * Prepare the given value for storage.
     *
     * @phpstan-ignore-next-line
     * @SuppressWarnings(PHPMD.UnusedFormalParameter)
     * @param  array<string, mixed>  $attributes
     */
    #[Override]
    public function set(Model $model, string $key, mixed $value, array $attributes): ?string
    {
        $preparedValue = $value;

        if($value === null) {
            $preparedValue = null;

        } elseif(\is_array($value)) {
            $preparedValue = implode(',', $value);
        }

        return (string) $preparedValue;
    }
}
