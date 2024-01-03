<?php

namespace App\Http\Controllers\Admin;

use App\Actions\Admin\DailyBread\AdminDailyBreadStoreAction;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\DailyBread\AdminDailyBreadRequest;
use App\Http\Requests\Admin\DailyBread\AdminDailyBreadUpdateRequest;
use App\Models\DailyBread;
use Illuminate\Validation\ValidationException;

class AdminDailyBreadController extends Controller
{
    public function index()
    {
        $dailyBreads = DailyBread::all();
        return inertia("Admin/AdminDailyBread/Index",[
            'dailyBreads'=>$dailyBreads
        ]);
    }

    public function create()
    {
        return inertia("Admin/DailyBread/Create");
    }

    public function store(AdminDailyBreadRequest $request,AdminDailyBreadStoreAction $action)
    {
        try {
            $action->handle($request);
        } catch (\Exception $e) {
            throw ValidationException::withMessages([$e->getMessage()]);
        }
        return to_route("admin.dailyBreads.index")->with("success","dailyBread-created");
    }

    public function show(DailyBread $dailyBread)
    {
    }

    public function edit(DailyBread $dailyBread)
    {
    }

    public function update(AdminDailyBreadUpdateRequest $request, DailyBread $dailyBread)
    {
    }

    public function destroy(DailyBread $dailyBread)
    {
    }
}
