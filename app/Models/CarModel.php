<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Query\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\{BelongsTo, HasMany};

/**
 * @property int $id
 * @property int $brand_id
 * @property string $name
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\CarBrand $brand
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\CarGeneration> $generations
 * @property-read int|null $generations_count
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CarModel newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CarModel newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CarModel query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CarModel whereBrandId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CarModel whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CarModel whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CarModel whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CarModel whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CarModel joinWithBrand()
 * @property string $slug
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CarModel whereSlug($value)
 * @mixin \Eloquent
 */
final class CarModel extends Model
{
    protected $fillable = [
        'name',
        'slug'
    ];

    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime'
    ];

    public function brand(): BelongsTo
    {
        return $this->belongsTo(CarBrand::class);
    }

    public function generations(): HasMany
    {
        return $this->hasMany(CarGeneration::class);
    }

    public function getFullName(): string
    {
        return $this->brand->name . ' ' . $this->name;
    }

    public function scopeJoinWithBrand(Builder $builder): Builder
    {
        return $builder->join(
            'car_brands',
            'car_models.brand_id',
            '=',
            'car_brands.id'
        );
    }
}
