<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Comment extends Model
{
    use HasFactory;
    protected $fillable = ["user_id","comment","commentable_id","commentable_type"];
    /*------------- relationship---------------*/
    public function commentable(): \Illuminate\Database\Eloquent\Relations\MorphTo
    {
        return $this->morphTo("commentable");
    }
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
