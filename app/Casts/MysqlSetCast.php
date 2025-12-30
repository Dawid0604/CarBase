<?php

declare(strict_types=1);

namespace App\Casts;

use Override;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Database\Eloquent\CastsAttributes;

/**
 * @implements CastsAttributes<array, string|array|null>
 */
final class MysqlSetCast implements CastsAttributes
{
    private const string ARRAY_SEPARATOR = ',';

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
        return empty($value) ? [] : self::removeEmptyParams(explode(self::ARRAY_SEPARATOR, $value));
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
        if ($value === null || $value === '' || empty($value)) {
            return null;
        } elseif (\is_array($value)) {
            return implode(self::ARRAY_SEPARATOR, self::removeEmptyParams($value));
        }

        return (string) $value;
    }

    private static function removeEmptyParams(array $value): array
    {
        return array_filter($value, fn($val) => trim($val) !== '');
    }
}
