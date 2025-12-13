<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * @property int $id
 * @property string $name
 * @property string $logo
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\CarModel> $models
 * @property-read int|null $models_count
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CarBrand newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CarBrand newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CarBrand query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CarBrand whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CarBrand whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CarBrand whereLogo($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CarBrand whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CarBrand whereUpdatedAt($value)
 * @mixin \Eloquent
 */
final class CarBrand extends Model
{
    protected $fillable = [
        'name',
        'logo'
    ];

    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime'
    ];

    public function models(): HasMany
    {
        return $this->hasMany(CarModel::class);
    }
}
