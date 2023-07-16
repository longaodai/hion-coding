<?php

namespace App\Http\Requests\Post;

use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Http\FormRequest;
use App\Services\Categories\CategoryServiceInterface;

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
        $this->validateCustom();

        return [
            'name' => 'required|min:3|max:100',
            'slug' => 'required|min:3|max:100|unique:posts,post_slug',
            'category_id' => 'nullable|valid_category_id',
            'active' => ['bail', 'nullable', Rule::in([ACTIVE_SHOW, NOT_ACTIVE_SHOW])],
        ];
    }

    public function validateCustom()
    {
        Validator::extend('valid_category_id', function ($attribute, $value, $parameters) {
            $categoryService = app(CategoryServiceInterface::class);
            $dataCategory = $categoryService->show(['id' => $value]);

            return !empty($dataCategory);
        });
    }

    /**
     * Message for validation
     *
     * @return array
     *
     * @author longvc <vochilong.work@gmail.com>
     */
    public function messages()
    {
        return [
            'valid_category_id' => __('validation.exists', ['attribute' => __('category.lbl_name')]),
        ];
    }
}
