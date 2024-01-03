<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Inertia\Testing\Concerns\Has;

class Administrator extends Authenticatable
{
    use HasFactory;
    protected $fillable = ['login',"password","photo_url"];

}
