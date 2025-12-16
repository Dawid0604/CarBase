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
 * @property-read \App\Models\CarEngine $engine
 * @property-read \App\Models\User $user
 * @property-write mixed $dynamic
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CarEngineReview newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CarEngineReview newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CarEngineReview query()
 * @mixin \Eloquent
 */
final class CarEngineReview extends Model
{
    protected $fillable = [
        'consumption',
        'reliability',
        'rating',
        'dynamic',
        'consumption',
        'recommendation',
        'comment'
    ];

    protected $casts = [
        'rating' => 'integer',
        'recommendation' => 'boolean',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
        'reliability' => RateCast::class,
        'consumption' => RateCast::class,
        'dynamic' => RateCast::class
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function engine(): BelongsTo
    {
        return $this->belongsTo(CarEngine::class);
    }
}
