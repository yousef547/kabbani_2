<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class productRequest extends FormRequest
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
            'name_product'=>['required','string','max:50'],
            'slug_product'=>['required','string','max:50'],
            'short_description'=>['required','string','max:50'],
            'description_product'=>['required','string','max:350'],
            'parent'=>"required|integer",
            'price_product'=>"required|integer",
            'old_product'=>"required|integer",
            'image_product'=>['nullable', 'image', 'mimes:jpeg,jpg,png,gif'],
            'enable'=>['nullable',Rule::in([1])],
            'bestseller_product'=>['nullable',Rule::in([1])],
            'featured_product'=>['nullable',Rule::in([1])],

        ];
    }
}
