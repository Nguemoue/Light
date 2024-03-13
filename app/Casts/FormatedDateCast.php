<?php

namespace App\Casts;

use Carbon\Carbon;
use Illuminate\Contracts\Database\Eloquent\CastsAttributes;

class FormatedDateCast implements CastsAttributes
{
    public function get($model, $key, $value, $attributes)
    {
      return Carbon::parse($value)->diffForHumans();
    }

    public function set($model, $key, $value, $attributes)
    {

    }
}
