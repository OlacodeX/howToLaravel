<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Comment extends Model
{
    use HasFactory, HasUuids;

    protected $table = "comments";

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'comment',
        'commentor_name',
        'commentor_email',
        'tutorial_id'
    ];

     /**
     * Get tutorial comment belongs to
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function tutorial(): BelongsTo
    {
        return $this->belongsTo(Tutorial::class);
    }

}
