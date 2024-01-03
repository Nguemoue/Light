<?php

namespace App\Http\Requests\Admin\DailyBread;

use App\Models\Administrator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class AdminDailyBreadRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            "title"=>"required|string|unique:daily_breads,title",
            "description"=>['required',"string"],
            "poster_url"=>['nullable',"image"]
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
