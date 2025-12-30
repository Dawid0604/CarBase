<?php

declare(strict_types=1);

namespace App\Models;

use App\Casts\MysqlSetCast;
use App\Enums\CarTimingBeltType;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\{BelongsTo, BelongsToMany, HasMany};

/**
 * @property int $id
 * @property string $name
 * @property string $slug
 * @property int $displacement
 * @property int $power
 * @property int $torque
 * @property array|null $transmission_types
 * @property array|null $drive_types
 * @property string $oil_grade
 * @property numeric $oil_capacity
 * @property array<array-key, mixed>|null $oil_change_interval
 * @property array<array-key, mixed>|null $timing_belt_change_interval
 * @property int|null $acceleration
 * @property int|null $max_speed
 * @property numeric|null $city_consumption
 * @property numeric|null $avg_consumption
 * @property numeric|null $route_consumption
 * @property numeric|null $avg_rating
 * @property int $views_count
 * @property-read int|null $reviews_count
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property int $engine_id
 * @property-read \App\Models\Engine $engine
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\CarGeneration> $generations
 * @property-read int|null $generations_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\EngineReview> $reviews
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CarEngine newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CarEngine newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CarEngine query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CarEngine whereAcceleration($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CarEngine whereAvgConsumption($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CarEngine whereAvgRating($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CarEngine whereCityConsumption($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CarEngine whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CarEngine whereDisplacement($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CarEngine whereDriveTypes($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CarEngine whereEngineId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CarEngine whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CarEngine whereMaxSpeed($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CarEngine whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CarEngine whereOilCapacity($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CarEngine whereOilChangeInterval($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CarEngine whereOilGrade($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CarEngine wherePower($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CarEngine whereReviewsCount($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CarEngine whereRouteConsumption($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CarEngine whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CarEngine whereTimingBeltChangeInterval($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CarEngine whereTimingBeltType($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CarEngine whereTorque($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CarEngine whereTransmissionTypes($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CarEngine whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CarEngine whereViewsCount($value)
 * @property CarTimingBeltType $timing_belt_type
 * @mixin \Eloquent
 */
final class CarEngine extends Model
{
    protected $fillable = [
        'name',
        'fuel_type',
        'displacement',
        'power',
        'torque',
        'transmission_types',
        'drive_types',
        'acceleration',
        'max_speed',
        'city_consumption',
        'avg_consumption',
        'route_consumption',
        'oil_grade',
        'oil_capacity',
        'oil_change_interval',
        'timing_belt_type',
        'timing_belt_change_interval',
        'slug'
    ];

    protected $casts = [
        'displacement' => 'integer',
        'power' => 'integer',
        'torque' => 'integer',
        'acceleration' => 'integer',
        'max_speed' => 'integer',
        'city_consumption' => 'decimal:2',
        'oil_capacity' => 'decimal:2',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
        'oil_change_interval' => 'array',
        'timing_belt_change_interval' => 'array',
        'transmission_types' => MysqlSetCast::class,
        'drive_types' => MysqlSetCast::class,
        'timing_belt_type' => CarTimingBeltType::class
    ];

    public function reviews(): HasMany
    {
        return $this->hasMany(EngineReview::class);
    }

    public function generations(): BelongsToMany
    {
        return $this->belongsToMany(
            CarGeneration::class,
            'car_generation_engines',
            'engine_id',
            'generation_id'
        );
    }

    public function engine(): BelongsTo
    {
        return $this->belongsTo(Engine::class);
    }
}
