<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DailyBread extends Model
{
    use HasFactory;
    protected $casts = [
        'created_at' => "date"
    ];
    protected $fillable = ['title','poster_url','description'];
    public function posterUrl(): Attribute
    {
        return Attribute::make(
            get: fn() => asset("storage/".$this->attributes['poster_url']),
            set: fn($value) => $value,
        );
    }
}
