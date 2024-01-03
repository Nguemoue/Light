<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Inertia\Inertia;

class AdminHomeControlerController extends Controller
{
    public function __invoke()
    {
        return inertia("Admin/Home");
    }
}
