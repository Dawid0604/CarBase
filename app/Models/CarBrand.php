<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\{Builder, Factories\HasFactory, Model};

/**
 * @property int $id
 * @property string $name
 * @property string $slug
 * @property string $logo
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Engine> $engines
 * @property int|null $engines_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\CarModel> $models
 * @property-read int|null $models_count
 * @method static Builder<static>|CarBrand findNameBySlug(string $slug)
 * @method static Builder<static>|CarBrand newModelQuery()
 * @method static Builder<static>|CarBrand newQuery()
 * @method static Builder<static>|CarBrand orderByName()
 * @method static Builder<static>|CarBrand query()
 * @method static Builder<static>|CarBrand whereCreatedAt($value)
 * @method static Builder<static>|CarBrand whereId($value)
 * @method static Builder<static>|CarBrand whereLogo($value)
 * @method static Builder<static>|CarBrand whereName($value)
 * @method static Builder<static>|CarBrand whereSlug($value)
 * @method static Builder<static>|CarBrand whereSlugIsNotEqual(string $slug)
 * @method static Builder<static>|CarBrand whereUpdatedAt($value)
 * @method static \Database\Factories\CarBrandFactory factory($count = null, $state = [])
 * @mixin \Eloquent
 */
final class CarBrand extends Model
{
    /** @use HasFactory<\Database\Factories\CarBrandFactory> */
    use HasFactory;

    protected $fillable = [
        'name',
        'logo',
        'slug'
    ];

    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime'
    ];

    public function models(): HasMany
    {
        return $this->hasMany(CarModel::class);
    }

    public function engines(): HasMany
    {
        return $this->hasMany(
            Engine::class,
            'brand_id',
            'id'
        );
    }

    public function scopeOrderByName(Builder $builder): Builder
    {
        return $builder->orderBy('car_brands.name');
    }

    public function scopeFindNameBySlug(Builder $builder, string $slug): Builder
    {
        return $builder
            ->select('name')
            ->where('slug', '=', $slug);
    }

    public function scopeWhereSlugIsNotEqual(Builder $builder, string $slug): Builder
    {
        return $builder->where('slug', '!=', $slug);
    }
}
