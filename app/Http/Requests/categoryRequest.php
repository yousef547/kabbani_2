<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class categoryRequest extends FormRequest
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
            'name_ar'=>['required','string','max:50'],
            'name_en'=>['required','string','max:50'],
            'image'=>['nullable', 'image', 'mimes:jpeg,jpg,png,gif'],
            'enable'=>['nullable',Rule::in([1])],
        ];
    }
}
