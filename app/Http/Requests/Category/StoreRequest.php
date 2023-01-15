<?php

namespace App\Http\Requests\Category;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|min:3|max:100',
            'icon' => 'bail|nullable|max:100',
            'tag' => 'bail|nullable|max:150',
            'description' => 'bail|nullable|max:150',
            'active' => ['bail', 'nullable', Rule::in([ACTIVE_SHOW, NOT_ACTIVE_SHOW])],
        ];
    }
}
