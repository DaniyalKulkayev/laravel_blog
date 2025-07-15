<?php

namespace App\Http\Requests\Admin\Post;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
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
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'title' => 'required|string',
            'content' => 'required|string',
            'category_id' => 'required|exists:categories,id',
            'preview_image' => 'required|file|image',
            'main_image' => 'required|file|image',
            'tag_ids' => 'nullable|array',
            'tag_ids.*' => 'nullable|exists:tags,id',
        ];
    }
    public function messages()
    {
        return [
            'title.required' => 'Field can not be empty',
            'title.string' => 'Field should be string',
            'content.required' => 'Field can not be empty',
            'content.string' => 'Field should be string',
            'category_id.required' => 'Field can not be empty',
            'category_id.exists' => 'Category not found',
            'preview_image.required' => 'Field can not be empty',
            'preview_image.image' => 'Field should be image',
            'main_image.required' => 'Field can not be empty',
            'main_image.image' => 'Field should be image',
            'tag_ids.array' => 'Field can not be empty',
            'tag_ids.exists' => 'Tag not found',
        ];
    }
}
