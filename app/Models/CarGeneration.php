<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\{BelongsTo, HasMany};

/**
 * @property int $id
 * @property int $model_id
 * @property string $name
 * @property int $production_from
 * @property int|null $production_to
 * @property string|null $image
 * @property \App\Models\CarType $type Car segment: A=mini, B=small, C=medium, D=large, E=executive, F=luxury
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\CarEngine> $engines
 * @property-read int|null $engines_count
 * @property-read \App\Models\CarModel $model
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CarGeneration newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CarGeneration newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CarGeneration query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CarGeneration whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CarGeneration whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CarGeneration whereImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CarGeneration whereModelId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CarGeneration whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CarGeneration whereProductionFrom($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CarGeneration whereProductionTo($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CarGeneration whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CarGeneration whereUpdatedAt($value)
 * @mixin \Eloquent
 */
final class CarGeneration extends Model
{
    protected $fillable = [
        'name',
        'production_from',
        'production_to',
        'image',
        'type'
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

    public function engines(): HasMany
    {
        return $this->hasMany(CarEngine::class);
    }

    public function getFullName(): string
    {
        return $this->model->name . ' ' . $this->name;
    }
}
