<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\{Builder, Model};
use Illuminate\Database\Eloquent\Relations\{BelongsTo, BelongsToMany};


/**
 * @property int $id
 * @property int $model_id
 * @property string $name
 * @property string $slug
 * @property int $production_from
 * @property int|null $production_to
 * @property string|null $image
 * @property \App\Models\CarType $type Car segment: A=mini, B=small, C=medium, D=large, E=executive, F=luxury
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\CarEngine> $engines
 * @property-read int|null $engines_count
 * @property-read \App\Models\CarModel $model
 * @method static Builder<static>|CarGeneration joinWithBrand()
 * @method static Builder<static>|CarGeneration joinWithModel()
 * @method static Builder<static>|CarGeneration newModelQuery()
 * @method static Builder<static>|CarGeneration newQuery()
 * @method static Builder<static>|CarGeneration query()
 * @method static Builder<static>|CarGeneration whereCreatedAt($value)
 * @method static Builder<static>|CarGeneration whereId($value)
 * @method static Builder<static>|CarGeneration whereImage($value)
 * @method static Builder<static>|CarGeneration whereModelId($value)
 * @method static Builder<static>|CarGeneration whereName($value)
 * @method static Builder<static>|CarGeneration whereProductionFrom($value)
 * @method static Builder<static>|CarGeneration whereProductionTo($value)
 * @method static Builder<static>|CarGeneration whereSlug($value)
 * @method static Builder<static>|CarGeneration whereType($value)
 * @method static Builder<static>|CarGeneration whereUpdatedAt($value)
 * @mixin \Eloquent
 */
final class CarGeneration extends Model
{
    protected $fillable = [
        'name',
        'production_from',
        'production_to',
        'image',
        'type',
        'slug'
    ];

    protected $casts = [
        'production_from' => 'integer',
        'production_to' => 'integer',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
        'type' => CarType::class
    ];

    public function model(): BelongsTo
    {
        return $this->belongsTo(CarModel::class);
    }

    public function getFullName(): string
    {
        return $this->model->name . ' ' . $this->name;
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

    public function scopeJoinWithModel(Builder $builder): Builder
    {
        return $builder->join(
            'car_models',
            'car_generations.model_id',
            '=',
            'car_models.id'
        );
    }

    public function engines(): BelongsToMany
    {
        return $this->belongsToMany(
            CarEngine::class,
            'car_generation_engines',
            'generation_id',
            'engine_id'
        );
    }
}
