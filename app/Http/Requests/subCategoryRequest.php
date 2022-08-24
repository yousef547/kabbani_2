<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

use App\Models\category;
use App\Models\MainCategory;



class subCategoryRequest extends FormRequest
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
        $categories = category::pluck('id');
        $mainCategories = MainCategory::pluck('id');

        return [
            'name_ar'=>['required','string','max:50'],
            'name_en'=>['required','string','max:50'],
            'image'=>['nullable', 'image', 'mimes:jpeg,jpg,png,gif'],
            'icon'=>['nullable', 'image', 'mimes:jpeg,jpg,png,gif'],
            'category'=>['required',Rule::in($categories)],
            'mainCategory'=>['required',Rule::in($mainCategories)],
            'enable'=>['nullable',Rule::in([1])],
        ];
    }
}
