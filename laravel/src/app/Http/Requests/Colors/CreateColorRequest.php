<?php

namespace App\Http\Requests\Colors;


use Illuminate\Foundation\Http\FormRequest;

class CreateColorRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     */
    public function rules(): array
    {
        return [
            'name' => 'required|string|min:1|max:255',
            'hex' => 'required|string|size:7|regex:/^#[0-9A-Fa-f]{6}$/',
            'thumb' => 'required|image|max:2048',
        ];
    }
}
