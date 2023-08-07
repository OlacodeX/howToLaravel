<?php

namespace App\Models;

use App\Enums\Status;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class Tutorial extends Model
{
    use HasFactory, HasUuids, Sluggable, SoftDeletes;

    protected $table = "tutorials";

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
    */
    protected $casts = [
        'tags' => 'array',
        'status' => Status::class,
        'created_at' => 'datetime',
        'deleted_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'topic',
        'body',
        'slug',
        'author_id',
        'tags',
        'banner',
    ];

    protected function createdAt(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => Carbon::parse($value)->toFormattedDateString(),
        );
    }

    protected function banner(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => $value,
            // get: fn ($value) => config('services.helpers.base_path')."/storage/images"."/".$value,
        );
    }
    /**
     * Return the sluggable configuration array for this model.
     *
     * @return array
     */
    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'topic'
            ]
        ];
    }

    /**
     * Get the user that owns the Tutorial
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function author(): BelongsTo
    {
        return $this->belongsTo(User::class, 'author_id');
    }

    /**
     * Get all of the comments for the Tutorial
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function comments(): HasMany
    {
        return $this->hasMany(Comment::class);
    }

}
