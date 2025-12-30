<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\{BelongsTo, HasMany};
use Illuminate\Database\Eloquent\{Builder, Factories\HasFactory, Model};
use App\Enums\{EngineFuelType, EngineInjectionType, EngineLayout, LpgCompability};

/**
 * @property int $id
 * @property string $name
 * @property string $slug
 * @property string $description
 * @property array<array-key, mixed> $advantages
 * @property array<array-key, mixed> $disadvantages
 * @property bool $turbocharger
 * @property int $valve_count
 * @property numeric $rating
 * @property int $reliability
 * @property int $consumption
 * @property int $dynamic
 * @property int $number_of_views
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property int $power
 * @property int $brand_id
 * @property-read \App\Models\CarBrand $brand
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\EngineReview> $engineReviews
 * @property-read int|null $engine_reviews_count
 * @property-read int $likes
 * @property-read int $dislikes
 * @method static Builder<static>|Engine newModelQuery()
 * @method static Builder<static>|Engine newQuery()
 * @method static Builder<static>|Engine query()
 * @method static Builder<static>|Engine selectByBrand(string $slug)
 * @method static Builder<static>|Engine selectDetails()
 * @method static Builder<static>|Engine selectWithBrand()
 * @method static Builder<static>|Engine selectWithBrandAndStats()
 * @method static Builder<static>|Engine whereAdvantages($value)
 * @method static Builder<static>|Engine whereBrandId($value)
 * @method static Builder<static>|Engine whereConsumption($value)
 * @method static Builder<static>|Engine whereCreatedAt($value)
 * @method static Builder<static>|Engine whereDescription($value)
 * @method static Builder<static>|Engine whereDisadvantages($value)
 * @method static Builder<static>|Engine whereDynamic($value)
 * @method static Builder<static>|Engine whereEngineLayout($value)
 * @method static Builder<static>|Engine whereFuelType($value)
 * @method static Builder<static>|Engine whereId($value)
 * @method static Builder<static>|Engine whereInjectionType($value)
 * @method static Builder<static>|Engine whereLpg($value)
 * @method static Builder<static>|Engine whereName($value)
 * @method static Builder<static>|Engine whereNumberOfViews($value)
 * @method static Builder<static>|Engine wherePower($value)
 * @method static Builder<static>|Engine whereRating($value)
 * @method static Builder<static>|Engine whereReliability($value)
 * @method static Builder<static>|Engine whereSlug($value)
 * @method static Builder<static>|Engine whereTurbocharger($value)
 * @method static Builder<static>|Engine whereUpdatedAt($value)
 * @method static Builder<static>|Engine whereValveCount($value)
 * @method static Builder<static>|Engine withBrand(array $columns = [])
 * @property LpgCompability $lpg
 * @property EngineLayout $engine_layout
 * @property EngineInjectionType $injection_type
 * @property EngineFuelType $fuel_type
 * @method static \Database\Factories\EngineFactory factory($count = null, $state = [])
 * @mixin \Eloquent
 */
final class Engine extends Model
{
    /** @use HasFactory<\Database\Factories\EngineFactory> */
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'specification',
        'advantages',
        'disadvantages',
        'power',
        'lpg',
        'turbocharger',
        'engine_layout',
        'value_count',
        'injection_type',
        'fuel_type',
        'comment',
        'slug'
    ];

    protected $casts = [
        'specification' => 'array',
        'advantages' => 'array',
        'disadvantages' => 'array',
        'lpg' => LpgCompability::class,
        'turbocharger' => 'bool',
        'engine_layout' => EngineLayout::class,
        'fuel_type' => EngineFuelType::class,
        'injection_type' => EngineInjectionType::class,
        'valve_count' => 'integer',
        'rating' => 'decimal:2',
        'power' => 'integer',
        'reliability' => 'integer',
        'consumption' => 'integer',
        'dynamic' => 'integer',
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

    public function scopeSelectWithBrandAndStats(Builder $builder): Builder
    {
        return $this
            ->scopeWithBrand($builder)
            ->select([
                'id',
                'name',
                'power',
                'fuel_type',
                'number_of_views',
                'brand_id',
                'slug'
            ])
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

    public function scopeSelectWithBrand(Builder $builder): Builder
    {
        return $this
            ->scopeWithBrand($builder)
            ->select([
                'id',
                'name',
                'power',
                'fuel_type',
                'number_of_views',
                'brand_id',
                'slug'
            ]);
    }

    public function scopeSelectDetails(Builder $builder): Builder
    {
        return $this
            ->scopeWithBrand($builder)
            ->select([
                'id',
                'name',
                'description',
                'advantages',
                'disadvantages',
                'fuel_type',
                'lpg',
                'turbocharger',
                'engine_layout',
                'valve_count',
                'injection_type',
                'rating',
                'reliability',
                'consumption',
                'dynamic',
                'number_of_views',
                'power',
                'slug',
                'brand_id'
            ]);
    }

    public function scopeSelectByBrand(Builder $builder, string $slug): Builder
    {
        return $builder
            ->select([
                'engines.name',
                'engines.slug',
                'engines.brand_id',
                'engines.fuel_type'
            ])
            ->join('car_brands', 'engines.brand_id', '=', 'car_brands.id')
            ->where('car_brands.slug', '=', $slug);
    }

    public function scopeWithBrand(Builder $builder, array $columns = ['id', 'slug', 'name', 'logo']): Builder
    {
        if (!\in_array('id', $columns)) {
            array_unshift($columns, 'id');
        }

        return $builder->with('brand:' . implode(',', $columns));
    }
}
