<?php

namespace App\Events\Admin\Models;

use App\Models\DailyBread;
use Illuminate\Foundation\Events\Dispatchable;

class DailyBreadCreatedEvent
{
    use Dispatchable;

    public function __construct(public DailyBread $dailyBread)
    {
    }
}
