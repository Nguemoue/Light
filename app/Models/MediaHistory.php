<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MediaHistory extends Model
{
    protected $fillable = ['administrator_id',"media_type","media_id"];
    public function media(): \Illuminate\Database\Eloquent\Relations\MorphTo
    {
        return $this->morphTo("media");
    }
}
