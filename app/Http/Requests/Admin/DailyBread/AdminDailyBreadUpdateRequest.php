<?php

namespace App\Http\Requests\Admin\DailyBread;

use Illuminate\Foundation\Http\FormRequest;

class AdminDailyBreadUpdateRequest extends FormRequest
{
    public function rules(): array
    {
        return [

        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
