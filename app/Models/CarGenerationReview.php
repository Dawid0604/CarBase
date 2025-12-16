<?php

declare(strict_types=1);

namespace App\Models;

use App\Casts\RateCast;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * @property int $id
 * @property int $user_id
 * @property int $engine_id
 * @property int $rating
 * @property numeric|null $city_consumption
 * @property numeric|null $avg_consumption
 * @property numeric|null $route_consumption
 * @property int $reliability
 * @property int $comfort
 * @property int $consumption
 * @property int $maintenance_costs
 * @property string|null $comment
 * @property bool $recommendation
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property int $generation_id
 * @property-read \App\Models\CarGeneration $generation
 * @property-read \App\Models\User $user
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CarGenerationReview newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CarGenerationReview newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CarGenerationReview query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CarGenerationReview whereAvgConsumption($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CarGenerationReview whereCityConsumption($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CarGenerationReview whereComfort($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CarGenerationReview whereComment($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CarGenerationReview whereConsumption($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CarGenerationReview whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CarGenerationReview whereEngineId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CarGenerationReview whereGenerationId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CarGenerationReview whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CarGenerationReview whereMaintenanceCosts($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CarGenerationReview whereRating($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CarGenerationReview whereRecommendation($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CarGenerationReview whereReliability($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CarGenerationReview whereRouteConsumption($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CarGenerationReview whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CarGenerationReview whereUserId($value)
 * @mixin \Eloquent
 */
final class CarGenerationReview extends Model
{
    protected $fillable = [
        'city_consumption',
        'avg_consumption',
        'route_consumption',
        'reliability',
        'comfort',
        'consumption',
        'maintenance_costs',
        'rating',
        'recommendation',
        'comment'
    ];

    protected $casts = [
        'rating' => 'integer',
        'city_consumption' => 'decimal:2',
        'avg_consumption' => 'decimal:2',
        'route_consumption' => 'decimal:2',
        'recommendation' => 'boolean',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
        'reliability' => RateCast::class,
        'comfort' => RateCast::class,
        'consumption' => RateCast::class,
        'maintenance_costs' => RateCast::class
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function generation(): BelongsTo
    {
        return $this->belongsTo(CarGeneration::class);
    }
}
