<?php

declare(strict_types=1);

namespace App\Models;

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
 * @property-read \App\Models\CarEngine $engine
 * @property-read \App\Models\User $user
 * @method static \Illuminate\Database\Eloquent\Builder<static>|UserReview newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|UserReview newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|UserReview query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|UserReview whereAvgConsumption($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|UserReview whereCityConsumption($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|UserReview whereComfort($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|UserReview whereComment($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|UserReview whereConsumption($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|UserReview whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|UserReview whereEngineId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|UserReview whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|UserReview whereMaintenanceCosts($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|UserReview whereRating($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|UserReview whereRecommendation($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|UserReview whereReliability($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|UserReview whereRouteConsumption($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|UserReview whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|UserReview whereUserId($value)
 * @mixin \Eloquent
 */
final class UserReview extends Model
{
    protected $with = [
        'user'
    ];

    protected $fillable = [
        'city_consumption',
        'avg_consumption',
        'route_consumption',
        'reliability',
        'rating',
        'comfort',
        'consumption',
        'maintenance_costs',
        'recommendation',
        'comment'
    ];

    protected $casts = [
        'rating' => 'integer',
        'city_consumption' => 'decimal:2',
        'avg_consumption' => 'decimal:2',
        'route_consumption' => 'decimal:2',
        'reliability' => 'integer',
        'comfort' => 'integer',
        'consumption' => 'integer',
        'maintenance_costs' => 'integer',
        'recommendation' => 'boolean',
        'created_at' => 'datetime',
        'updated_at' => 'datetime'
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function engine(): BelongsTo
    {
        return $this->belongsTo(CarEngine::class);
    }

    public function setReliabilityAttribute(int $value): void
    {
        $this->attributes['reliability'] = static::getRateValue($value);
    }

    public function setComfortAttribute(int $value): void
    {
        $this->attributes['comfort'] = static::getRateValue($value);
    }

    public function setConsumptionAttribute(int $value): void
    {
        $this->attributes['consumption'] = static::getRateValue($value);
    }

    public function setMaintenanceCostsAttribute(int $value): void
    {
        $this->attributes['maintenance_costs'] = static::getRateValue($value);
    }

    private static function getRateValue(int $value): int {
        return max(1, min(5, $value));
    }
}
