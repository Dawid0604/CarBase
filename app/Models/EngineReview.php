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
 * @property int $reliability
 * @property int $consumption
 * @property int $dynamic
 * @property string|null $comment
 * @property bool $recommendation
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\CarEngine $engine
 * @property-read \App\Models\User $user
 * @method static \Illuminate\Database\Eloquent\Builder<static>|EngineReview newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|EngineReview newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|EngineReview query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|EngineReview whereComment($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|EngineReview whereConsumption($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|EngineReview whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|EngineReview whereDynamic($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|EngineReview whereEngineId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|EngineReview whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|EngineReview whereRating($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|EngineReview whereRecommendation($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|EngineReview whereReliability($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|EngineReview whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|EngineReview whereUserId($value)
 * @mixin \Eloquent
 */
final class EngineReview extends Model
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
