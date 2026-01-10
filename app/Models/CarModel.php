<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\{
    Builder,
    Model
};
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\{
    BelongsTo,
    HasMany
};

/**
 * @property int $id
 * @property int $brand_id
 * @property string $name
 * @property string $slug
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\CarBrand $brand
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\CarGeneration> $generations
 * @property-read int|null $generations_count
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CarModel joinWithBrand()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CarModel newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CarModel newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CarModel query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CarModel whereBrandId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CarModel whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CarModel whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CarModel whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CarModel whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CarModel whereUpdatedAt($value)
 * @method static Builder<static>|CarModel whereBrandSlug(string $slug)
 * @method static \Database\Factories\CarModelFactory factory($count = null, $state = [])
 * @mixin \Eloquent
 */
final class CarModel extends Model
{
    /** @use HasFactory<\Database\Factories\CarModelFactory> */
    use HasFactory;

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
        return $this->belongsTo(
            CarBrand::class,
            'brand_id',
            'id'
        );
    }

    public function generations(): HasMany
    {
        return $this->hasMany(
            CarGeneration::class,
            'model_id',
            'id'
        );
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

    public function scopeWhereBrandSlug(Builder $builder, string $slug): Builder
    {
        return $builder->where('car_brands.slug', $slug);
    }
}
