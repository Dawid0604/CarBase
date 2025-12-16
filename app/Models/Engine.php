<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\{Builder, Model};
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * @property int $id
 * @property string $name
 * @property string $description
 * @property array<array-key, mixed> $advantages
 * @property array<array-key, mixed> $disadvantages
 * @property \App\Models\LpgCompability $lpg
 * @property bool $turbocharger
 * @property string $engine_layout
 * @property int $valve_count
 * @property string $injection_type
 * @property numeric $rating
 * @property int $reliability
 * @property int $consumption
 * @property int $dynamic
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property int $power
 * @property int $brand_id
 * @property \App\Models\EngineLayout $layout
 * @property-read int|null $reviews_total
 * @property-read int|null $likes
 * @property-read int|null $dislikes
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Engine newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Engine newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Engine query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Engine whereAdvantages($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Engine whereBrandId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Engine whereConsumption($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Engine whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Engine whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Engine whereDisadvantages($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Engine whereDynamic($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Engine whereEngineLayout($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Engine whereFuelType($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Engine whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Engine whereInjectionType($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Engine whereLpg($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Engine whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Engine wherePower($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Engine whereRating($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Engine whereReliability($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Engine whereTurbocharger($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Engine whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Engine whereValveCount($value)
 * @property-read \App\Models\CarBrand $brand
 * @method static Builder<static>|Engine selectWithBrand()
 * @property \App\Models\EngineFuelType $fuel_type
 * @property int $number_of_views
 * @method static Builder<static>|Engine whereNumberOfViews($value)
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\EngineReview> $engineReviews
 * @property-read int|null $engine_reviews_count
 * @mixin \Eloquent
 */
final class Engine extends Model
{
    protected $fillable = [
        'name',
        'description',
        'specification',
        'advantages',
        'disadvantages',
        'power',
        'lpg',
        'turbocharger',
        'layout',
        'value_count',
        'injection_type',
        'fuel_type',
        'comment',
        'recommendation'
    ];

    protected $casts = [
        'specification' => 'array',
        'advantages' => 'array',
        'disadvantages' => 'array',
        'lpg' => LpgCompability::class,
        'turbocharger' => 'bool',
        'layout' => EngineLayout::class,
        'fuel_type' => EngineFuelType::class,
        'valve_count' => 'integer',
        'rating' => 'decimal:2',
        'power' => 'integer',
        'reliability' => 'integer',
        'consumption' => 'integer',
        'dynamic' => 'integer',
        'recommendation' => 'bool',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
        'number_of_views' => 'integer'
    ];

    public function brand(): BelongsTo
    {
        return $this->belongsTo(CarBrand::class);
    }

    public function engineReviews(): HasMany
    {
        return $this->hasMany(EngineReview::class);
    }

    public function scopeSelectWithBrand(Builder $builder): Builder
    {
        return $builder
            ->select([
                'id',
                'name',
                'power',
                'fuel_type',
                'number_of_views',
                'brand_id'
            ])
            ->with('brand:id,name,logo')
            ->withCount([
                'engineReviews as reviews_total',

                'engineReviews as likes' => function ($query): void {
                    $query->where('recommendation', true);
                },

                'engineReviews as dislikes' => function ($query): void {
                    $query->where('recommendation', false);
                }
            ]);
    }
}
