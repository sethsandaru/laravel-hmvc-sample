<?php


namespace App\Modules\Home\Http\Requests;


use Illuminate\Foundation\Http\FormRequest;

class HomeRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [];
    }
}
