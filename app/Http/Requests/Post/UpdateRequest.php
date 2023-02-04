<?php

namespace App\Http\Requests\Post;

use App\Services\Categories\CategoryServiceInterface;
use App\Services\Posts\PostServiceInterface;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
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
            'id' => 'required|valid_post',
            'name' => 'required|min:3|max:100',
            'category_id' => 'nullable|valid_category_id',
            'active' => ['bail', 'nullable', Rule::in([ACTIVE_SHOW, NOT_ACTIVE_SHOW])],
        ];
    }

    /**
     * Custom validate
     *
     * @return mixed
     * 
     * @author longvc <vochilong.work@gmail.com>
     */
    public function validateCustom()
    {
        Validator::extend('valid_category_id', function ($attribute, $value, $parameters) {
            $categoryService = app(CategoryServiceInterface::class);
            $dataCategory = $categoryService->getFirstBy(collect(
                ['id' => $value]
            ));
           
            return !empty($dataCategory);
        });

        Validator::extend('valid_post', function ($attribute, $value, $parameters) {
            $postService = app(PostServiceInterface::class);
            $dataPost = $postService->getFirstBy(
                collect(['id' => $value])
            );

            if (empty($dataPost)) {
                return false;
            }
            
            $this->request->set('author_id', $dataPost->author_id);
            $this->request->set('old_image', $dataPost->post_image);
           
            return true;
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
            'valid_post' => __('validation.exists', ['attribute' => __('post.lbl_name')]),
        ];
    }
}
